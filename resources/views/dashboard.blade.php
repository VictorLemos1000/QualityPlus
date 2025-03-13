@extends('layouts.app')

@section('title', 'Página Inicial')

@section('content')
<div class="container dashboard-container">
    <div class="container">
        <h1 class="my-4">Bem-vindo ao QualityPlus</h1>
        <p>Compare preços e encontre as melhores ofertas.</p>

        <!-- Botão para o comparador de preços -->
        <a href="{{ route('comparador.index') }}" class="btn btn-primary btn-lg">
            <i class="fas fa-balance-scale"></i> Comparador de Preços
        </a>
    </div>
    <!-- Cabeçalho com navegação -->
    <header class="d-flex justify-content-between align-items-center header-custom">
    <a href="{{ route('dashboard') }}">
        <img src="{{ asset('images/Qualityplus.png') }}" alt="QualityPlus Logo" class="profile-logo">
    </a>
        <nav class="nav-custom">
            <ul class="d-flex list-unstyled m-0">
                <li><a href="{{ route('about') }}">Sobre</a></li>
                <li><a href="{{ route('contact') }}">Contato</a></li>
            </ul>
        </nav>

        <!-- Ícone de perfil e logout -->
        <div class="profile-logout d-flex align-items-center">
    <a href="{{ route('perfil') }}">
        <img src="{{ auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) . '?t=' . uniqid() : asset('images/Perfil.png') }}"
             alt="Mini Perfil"
             class="header-profile-image"
             id="header-profile-image">
    </a>
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn btn btn-link text-dark">
                    <i class="fa fa-sign-out"></i> Sair
                </button>
            </form>
            </div>


    </header>

    <!-- Banner -->
    <div class="banner mt-3">
        <img src="{{ asset('images/banner.png') }}" class="img-fluid rounded" alt="Banner">
    </div>

    <!-- Barra de Pesquisa e Criar Empresa -->
    <div class="search-container mt-4">
        <div class="search-wrapper">
            <input type="text" class="form-control search-input" placeholder="Pesquisar...">
        </div>
        <a href="{{ route('empresa.create') }}" class="btn-create">Criar Empresa</a>
    </div>

   <!-- Lista de Empresas -->
<section class="categories mt-4">
    <h4 class="highlight-title">Perto de você!</h4>
    <div class="items">
        @foreach ($empresas as $empresa)
            <a href="{{ route('empresa.sobre', ['id' => $empresa->id]) }}" class="item-link">
                <div class="item">
                    <img src="{{ asset('storage/' . $empresa->imagem) }}" alt="{{ $empresa->nome }}" class="img-fluid rounded">
                    <div>
                        <p>{{ $empresa->nome }}</p>
                        <span class="badge bg-warning text-dark">
                            {{ $empresa->status ? 'Ativa' : 'Inativa' }}
                        </span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</section>


    <!-- Rodapé -->
    <footer class="footer-custom mt-5">
        <p><i class="fas fa-envelope"></i> Quality@gmail.com</p>
        <p><i class="fab fa-instagram"></i> @QualityPlus</p>
        <p><i class="fab fa-whatsapp"></i> (91) 99234-3498</p>
    </footer>
</div>
@endsection

@push('styles')
<style>
    /* Container principal */
    .dashboard-container {
        padding: 40px;
        margin: 30px auto;
    }

    /* Cabeçalho */
    .header-custom {
        background-color: white;
        padding: 15px 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
    }

    /* Navegação – aqui definimos o gradiente e o texto branco */
    .nav-custom ul {
        gap: 20px;
    }
    .nav-custom a {
        text-decoration: none;
        font-weight: bold;
        /* Texto branco */
        color: #fff;
        padding: 8px 12px;
        transition: 0.3s;
        /* Gradiente com base em #006BE6; aqui usei uma variação de tonalidade */
        background: linear-gradient(to right, #006BE6, #007CE0);
        border-radius: 25px;
    }
    .nav-custom a:hover {
        /* Inverte ou ajusta o gradiente no hover */
        background: linear-gradient(to right, #007CE0, #006BE6);
    }

    /* Rodapé */
    .footer-custom {
        background: linear-gradient(to right, #006BE6, #0052cc);
        color: #fff;
        padding: 20px;
        text-align: center;
        border-radius: 0 0 10px 10px;
    }

    /* Botão Criar Empresa */
    .btn-create {
        background: #00B88A;
        color: #fff;
        font-weight: bold;
        padding: 10px 16px;
        border-radius: 25px;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        font-size: 14px;
    }
    .btn-create:hover {
        background: #009d80;
        transform: translateY(-3px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    /* Área de Pesquisa */
    .search-container {
        display: flex;
        align-items: center;
        gap: 15px;
        justify-content: center;
    }
    .search-wrapper {
        position: relative;
        display: flex;
        align-items: center;
        background: #f1f1f1;
        border-radius: 20px;
        padding: 8px 12px;
        width: 280px;
    }
    .search-wrapper::before {
        content: "";
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        width: 18px;
        height: 18px;
        background: url('{{ asset('images/lupa.png') }}') no-repeat center;
        background-size: contain;
    }
    .search-input {
        border: none;
        outline: none;
        background: transparent;
        font-size: 14px;
        width: 100%;
        padding-left: 35px;
    }

    /* Destaque do Título "Perto de Você!" */
    .highlight-title {
        font-size: 24px;
        font-weight: bold;
        color: #006BE6;
        text-align: center;
        margin-bottom: 15px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .profile-header {
    width: 100%;
    height: 55px;
    background-color: white;
    display: flex;
    align-items: center;
    padding-left: 20px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    justify-content: space-between;
}

.header-profile-image {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    object-fit: cover;
    margin-right: 20px;
    cursor: pointer;
}

.profile-logo {
    cursor: pointer;
    transition: opacity 0.2s ease-in-out;
    height: 40px; /* Ajuste conforme o tamanho da logo */
}

.profile-logo:hover {
    opacity: 0.8;
}
</style>
@endpush
