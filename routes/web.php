<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AvaliacaoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Página inicial (Home)
Route::get('/', function () {
    return view('home');  // Certifique-se de que o arquivo home.blade.php esteja no diretório correto
})->name('home');

// Página Sobre (About)
Route::get('/about', function () {
    return view('about');  // Crie a view 'about' caso não exista
})->name('about');

// Página de Contato (Contact)
Route::get('/contact', function () {
    return view('contact');  // Certifique-se de que a view 'contact' exista
})->name('contact');

// Autenticação padrão do Laravel
Auth::routes();

// Página protegida (Dashboard)
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// Rota para login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Rota para registro
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Rota para logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');  // Redireciona para a página inicial após o logout
})->name('logout');

// Rota para avaliar item
Route::post('/avaliar-item', [AvaliacaoController::class, 'avaliarItem'])->middleware('auth')->name('avaliar-item');
