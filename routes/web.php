<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MapaLojasController;
use App\Http\Controllers\AlimentosController;

// Rotas protegidas (autenticadas)
Route::middleware(['auth'])->group(function () {
    // Perfil do usuário
    Route::get('/perfil', [ProfileController::class, 'index'])->name('perfil');
    Route::post('/perfil/update', [ProfileController::class, 'update'])->name('perfil.update');
    Route::post('/perfil/update-role', [ProfileController::class, 'updateRole'])->name('perfil.updateRole');

    // Rotas para Empresa
    Route::get('/empresa/create', [EmpresaController::class, 'create'])->name('empresa.create');
    Route::post('/empresa', [EmpresaController::class, 'store'])->name('empresa.store');
    Route::get('/empresa/{id}/edit', [EmpresaController::class, 'edit'])->name('empresa.edit');
    Route::put('/empresa/{id}', [EmpresaController::class, 'update'])->name('empresa.update');

    // Rotas para Produtos da Empresa
    Route::post('/produto', [ProdutoController::class, 'store'])->name('produto.store');
    Route::put('/produto/{id}', [ProdutoController::class, 'update'])->name('produto.update');
    Route::delete('/produto/{id}', [ProdutoController::class, 'destroy'])->name('produto.destroy');

    // OBS: A rota de edição (GET) pode ser opcional se você usar modais no frontend.
    // Caso precise, mantenha-a:
    Route::get('/produto/{id}/edit', [ProdutoController::class, 'edit'])->name('produto.edit');

    // Dashboard principal com filtro via parâmetro GET ?categoria=
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Avaliação de produtos
    Route::post('/avaliar-item', [AvaliacaoController::class, 'avaliarItem'])->name('avaliar-item');

    // Mapa de lojas
    Route::get('/lojas-mapa', [MapaLojasController::class, 'index'])->name('lojas-mapa');
});

// Rotas públicas

// Página inicial
Route::get('/', function () {
    return view('home');
})->name('home');

// Sobre
Route::get('/about', function () {
    return view('about');
})->name('about');

// Contato
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Detalhes do produto
Route::get('/produto/{id}', [ProdutoController::class, 'show'])->name('produto.show');

// Página da empresa com seus produtos (sobre)
Route::get('/empresa/{id}/sobre', [EmpresaController::class, 'sobre'])->name('empresa.sobre');

// Página de produtos por categoria (redirecionamento dos cards vai pra cá!)
Route::get('/produtos/categoria/{categoria}', [ProdutoController::class, 'porCategoria'])->name('produtos.por_categoria');

// Rotas específicas do módulo alimentos
Route::get('/alimentos/maca', [AlimentosController::class, 'mostrarMaca'])->name('alimentos.maca');
Route::get('/alimentos', [AlimentosController::class, 'index'])->name('alimentos.index');

// Rotas padrão de autenticação Laravel
Auth::routes();

// Rotas customizadas de autenticação
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
