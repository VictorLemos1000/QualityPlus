@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Cabeçalho -->
    <header class="header-custom">
        <!-- Logo que redireciona para Home ou Dashboard dependendo do estado de login -->
        <div class="logo">
            <a href="{{ auth()->check() ? route('dashboard') : route('home') }}">
                <span class="green">Quality</span><span class="blue">Plus+</span>
            </a>
        </div>
        
        <!-- Menu de navegação -->
        <nav>
            <ul class="d-flex list-unstyled m-0">
                <li><a href="{{ route('about') }}" class="text-dark mx-3">Sobre</a></li>
                <li><a href="{{ route('contact') }}" class="text-dark mx-3">Contato</a></li>
                @auth
                    <!-- Perfil e Logout -->
                    <div class="profile-logout d-flex align-items-center">
                        <div class="profile-icon">
                            <!-- Imagem de perfil do usuário -->
                            <img src="{{ asset('images/perfil.png') }}" alt="Perfil" class="rounded-circle" style="max-width: 50px;">
                        </div>

                        <!-- Botão de logout -->
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="logout-btn">Sair</button>
                        </form>
                    </div>
                @endauth
            </ul>
        </nav>
    </header>

    <!-- Título da página -->
    <h1>Sobre QualityPlus+</h1>

    <!-- Conteúdo da página -->
    <section class="content">
        <p>QualityPlus+ é uma plataforma criada para aumentar a visibilidade de microempresas, oferecendo ferramentas e recursos para que o seu negócio cresça mais rápido.</p>
    </section>
</div>
@endsection
