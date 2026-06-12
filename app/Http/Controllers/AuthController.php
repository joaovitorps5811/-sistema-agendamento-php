<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'senha' => ['required']
        ]);

        $credenciais = [
            'email' => $request->email,
            'password' => $request->senha 
        ];

        if (Auth::attempt($credenciais)){
            $request->session()->regenerate();

            $usuarioLogado = Auth::user();

            if ($usuarioLogado->tipo === 'admin') {
                return redirect('/dashboard-admin'); 
            }

            return redirect('/dashboard-user');
        }

        return back()->withErrors([
            'email' => 'Ops! As credenciais fornecidas não correspondem aos nossos registros.'
        ])->withInput();
    }

    public function cadastrar(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:usuarios,email'],
            'senha' => ['required', 'string'],
        ]);

        User::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
            'tipo' => 'cliente',
        ]);

        return redirect('/login')->with('sucesso', 'Cadastro realizado com sucesso! Faça seu login.');
    }

    public function dashboardUser()
    {
        $usuario = Auth::user();

        if (! $usuario instanceof User) {
            return redirect('/login');
        }

        $agendamentos = collect();

        if (method_exists($usuario, 'agendamentos')) {
            $agendamentos = $usuario->agendamentos()
                ->orderBy('data_agendamento', 'asc')
                ->get();
        }

        $proximoCompromisso = $agendamentos->first(function ($agendamento) {
            return strtolower((string) $agendamento->status) === 'confirmado';
        });

        return view('dashboard_user', compact('agendamentos', 'proximoCompromisso'));
    }

    public function salvarAgendamento(Request $request)
    {
        $validated = $request->validate([
            'servico' => ['required', 'string', 'max:255'],
            'data' => ['required', 'date', 'after_or_equal:today'],
            'horario' => ['required', 'string', 'max:255'],
        ]);

        $usuario = Auth::user();

        if (! $usuario instanceof User) {
            return redirect('/login');
        }

        $idServico = match ($validated['servico']) {
            'corte'  => 1,
            'barba'  => 2,
            'combo1' => 3,
            'combo2' => 4,
            default  => 1,
        };

        $usuario->agendamentos()->create([
            'id_servico'       => $idServico,
            'data_agendamento' => $validated['data'],
            'hora'             => $validated['horario'],
            'status'           => 'pendente',
        ]);

        return redirect('/dashboard-user')->with('sucesso', 'Agendamento criado com sucesso!');
    }

    public function dashboardAdmin()
    {
        if (Auth::user()->tipo !== 'admin') {
            return redirect('/dashboard-user');
        }

        $agendamentos = DB::table('agendamentos')
            ->join('usuarios', 'agendamentos.id_usuario', '=', 'usuarios.id')
            ->select('agendamentos.*', 'usuarios.nome as nome_cliente')
            ->orderBy('data_agendamento', 'asc')
            ->get();

        return view('dashboard_admin', compact('agendamentos'));
    }

    // Altera o status do agendamento para confirmado
    public function confirmarAgendamento($id)
    {
        if (Auth::user()->tipo !== 'admin') {
            return redirect('/dashboard-user');
        }

        DB::table('agendamentos')
            ->where('id', $id)
            ->update(['status' => 'confirmado']);

        return redirect('/dashboard-admin')->with('sucesso', 'Agendamento confirmado com sucesso!');
    }

    // Altera o status do agendamento para cancelado
    public function cancelarAgendamento($id)
    {
        if (Auth::user()->tipo !== 'admin') {
            return redirect('/dashboard-user');
        }

        DB::table('agendamentos')
            ->where('id', $id)
            ->update(['status' => 'cancelado']);

        return redirect('/dashboard-admin')->with('sucesso', 'Agendamento cancelado com sucesso!');
    }
    public function logout(Request $request)
{
    Auth::logout();

    
    $request->session()->invalidate();

    
    $request->session()->regenerateToken();

    return redirect('/login')->with('sucesso', 'Sessão encerrada com sucesso.');
}
}