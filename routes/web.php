<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OfertaController;

use App\Http\Controllers\LojaController;
use Illuminate\Support\Facades\Auth;

#use App\Http\Controllers\ProdutoContoller;

Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', [ProfileController::class, 'index'])->name('perfil');
    Route::post('/perfil/update', [ProfileController::class, 'update'])->name('perfil.update');
});

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

Route::middleware('auth')->group(function () {
    Route::get('/empresa/create', [EmpresaController::class, 'create'])->name('empresa.create');
    Route::post('/empresa', [EmpresaController::class, 'store'])->name('empresa.store');
    Route::get('/empresa/{id}/edit', [EmpresaController::class, 'edit'])->name('empresa.edit');  // Rota para exibir o formulário de edição
    Route::put('/empresa/{id}', [EmpresaController::class, 'update'])->name('empresa.update');  // Rota para atualizar a empresa
});

// Rotas de autenticação
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::post('/avaliar-item', [AvaliacaoController::class, 'avaliarItem'])->middleware('auth')->name('avaliar-item');
Route::get('/empresa/{id}/sobre', [EmpresaController::class, 'sobre'])->name('empresa.sobre');

// Rotas para Lojas
Route::apiResource('lojas', LojaController::class);

// Rotas para Produtos
Route::apiResource('produtos', ProdutoController::class);
Route::get('produtos/buscar', [ProdutoController::class, 'buscar'])->name('produtos.buscar');
Route::get('/produtos/{id}/historico', [ProdutoController::class, 'historico'])->name('produtos.historico');
Route::get('/produtos/{id}/historico', [ProdutoController::class, 'historico'])->name('produtos.historico');
// Rotas para Ofertas
Route::apiResource('ofertas', OfertaController::class);
Route::get('/ofertas/create', [OfertaController::class, 'create'])->name('ofertas.create');
Route::post('/ofertas', [OfertaController::class, 'store'])->name('ofertas.store');

// Rota para o comparador de produto
Route::get('/comparador', [ProdutoController::class, 'compararPrecos'])
    ->name('comparador.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
