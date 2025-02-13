<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\EmpresaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Página inicial (Home)
Route::get('/', function () {
    return view('home');  // Certifique-se de que o arquivo home.blade.php exista
})->name('home');

// Página Sobre (About)
Route::get('/about', function () {
    return view('about');  // Certifique-se de que a view 'about' exista
})->name('about');

// Página de Contato (Contact)
Route::get('/contact', function () {
    return view('contact');  // Certifique-se de que a view 'contact' exista
})->name('contact');

// Autenticação padrão do Laravel
Auth::routes();

// Página protegida (Dashboard)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

// Rotas de autenticação personalizadas
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');  // Redireciona para a página inicial após o logout
})->name('logout');

// Rota para avaliar item (proteção via middleware 'auth')
Route::post('/avaliar-item', [AvaliacaoController::class, 'avaliarItem'])
    ->middleware('auth')
    ->name('avaliar-item');

// Rotas para gerenciamento de empresas (protegidas por autenticação)
Route::middleware('auth')->group(function () {
    Route::get('/empresa/create', [EmpresaController::class, 'create'])->name('empresa.create');
    Route::post('/empresa', [EmpresaController::class, 'store'])
        ->name('empresa.store')
        ->middleware('auth'); // Garantindo que a rota de criação de empresa está protegida
});
