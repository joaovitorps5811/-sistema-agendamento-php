<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Rotas Iniciais
Route::get('/', function () {
    return view('welcome');
});

// Rotas de Login
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Rotas de Cadastro
Route::get('/cadastro', function () {
    return view('cadastro');
});
Route::post('/cadastro', [AuthController::class, 'cadastrar']);

// Rota para o dashboard do administrador
Route::get('/dashboard-admin', function () {
    return view('dashboard_admin');
});

// Rota para o dashboard do usuário comum
Route::get('/dashboard-user', [AuthController::class, 'dashboardUser'])->name('dashboard-user');

// Rota para criar novo agendamento
Route::get('/dashboard/user/novo-agendamento', function () {
    return view('novo_agendamento'); 
})->name('agendamento.novo');

// Essa rota vai receber os dados que o usuário digitar no formulário e mandar pro Controller
Route::post('/dashboard/user/salvar-agendamento', [AuthController::class, 'salvarAgendamento'])->name('agendamento.salvar');

Route::get('/dashboard-admin', [App\Http\Controllers\AuthController::class, 'dashboardAdmin'])->middleware('auth');

Route::post('/admin/agendamentos/{id}/confirmar', [AuthController::class, 'confirmarAgendamento'])->middleware('auth');
Route::post('/admin/agendamentos/{id}/cancelar', [AuthController::class, 'cancelarAgendamento'])->middleware('auth');


Route::get('/dashboard-admin', [AuthController::class, 'dashboardAdmin'])->middleware('auth');

Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->middleware('auth');