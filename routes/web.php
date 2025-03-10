<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
<<<<<<< HEAD
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
=======
use App\Http\Controllers\ProdutoContoller;
>>>>>>> 3be5aba (Criando tabelas, controllers, model, views e routes para entidade Produto.)

Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', [ProfileController::class, 'index'])->name('perfil');
    Route::post('/perfil/update', [ProfileController::class, 'update'])->name('perfil.update');
});

// Página inicial (Home)
Route::get('/', function () {
    return view('home');  // Certifique-se de que o arquivo home.blade.php exista
})->name('home');

<<<<<<< HEAD
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

Route::middleware('auth')->group(function () {
    Route::get('/empresa/create', [EmpresaController::class, 'create'])->name('empresa.create');
    Route::post('/empresa', [EmpresaController::class, 'store'])->name('empresa.store');
    Route::get('/empresa/{id}/edit', [EmpresaController::class, 'edit'])->name('empresa.edit');  // Rota para exibir o formulário de edição
    Route::put('/empresa/{id}', [EmpresaController::class, 'update'])->name('empresa.update');  // Rota para atualizar a empresa
});
=======
>>>>>>> 3be5aba (Criando tabelas, controllers, model, views e routes para entidade Produto.)

// Rotas de autenticação
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
<<<<<<< HEAD
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::post('/avaliar-item', [AvaliacaoController::class, 'avaliarItem'])->middleware('auth')->name('avaliar-item');
Route::get('/empresa/{id}/sobre', [EmpresaController::class, 'sobre'])->name('empresa.sobre');
=======

// Rotas para produtos
Route::apiResource('produto', ProdutoContoller::class);
Route::get('/produto', [ProdutoContoller::class, 'index'])->name('produto.index');
Route::get('/produto/create', [ProdutoContoller::class, 'create'])->name('produto.create');
Route::post('/produto', [ProdutoContoller::class, 'store'])->name('produto.store');
Route::get('/produto/{id}', [ProdutoContoller::class, 'show'])->name('produto.show');
Route::get('/produto/{id}/edit', [ProdutoContoller::class, 'update'])->name('produto.edit');
Route::put('/produto/{id}', [ProdutoContoller::class, 'update'])->name('produto.update');
Route::delete('produto/{id}', [ProdutoContoller::class, 'destroy'])->name('produto.destroy');
>>>>>>> 3be5aba (Criando tabelas, controllers, model, views e routes para entidade Produto.)
