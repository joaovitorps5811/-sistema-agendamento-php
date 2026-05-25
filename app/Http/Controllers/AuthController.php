<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required']
    ]);

    $credenciais = [
        'email' => $request->email,
        'senha' => $request->password 
    ];

    if (Auth::attempt($credenciais)){
        $request->session()->regenerate();

        
        $usuarioLogado = Auth::user();

        
        if ($usuarioLogado->tipo === 'admin') {
            return redirect('/dashboard-admin'); 
        }

        return redirect('/meus-agendamentos'); 
    }

    return back()->withErrors([
        'email' => 'As credenciais fornecidas não correspondem aos nossos registros.'
    ]);
}

    public function cadastrar(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email'],
            'password' => ['required', 'string'],
        ]);

        User::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => Hash::make($request->password),
            'tipo' => 'cliente',
        ]);

        return redirect('/login')->with('sucesso', 'Cadastro realizado com sucesso! Faça seu login.');
    }
}