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
Route::get('/meus-agendamentos', function () {
    return view('meus-agendamentos');
});
// Rota para o dashboard do usuário
Route::get('/dashboard-user', function () {
    return view('dashborard_user');
})->name('dashboard-user');

Route::get('/dashboard/user/novo-agendamento', function () {
    return view('novo_agendamento'); 
})->name('agendamento.novo');