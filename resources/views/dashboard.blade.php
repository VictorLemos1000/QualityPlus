@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Cabeçalho com navegação -->
    <header class="d-flex justify-content-between align-items-center bg-white text-dark p-3">
        <div class="logo">
            <span class="green">Quality</span><span class="blue">Plus+</span>
        </div>
        <nav>
            <ul class="d-flex list-unstyled m-0">
                <li><a href="{{ route('home') }}" class="text-dark mx-3">Home</a></li>
                <li><a href="{{ route('about') }}" class="text-dark mx-3">Sobre</a></li>
                <li><a href="{{ route('contact') }}" class="text-dark mx-3">Contato</a></li>
            </ul>
        </nav>

        <!-- Ícone de perfil e logout -->
        <div class="profile-logout d-flex align-items-center">
            <div class="profile-icon">
                <img src="{{ asset('images/perfil.png') }}" alt="Perfil" class="rounded-circle" width="40" height="40">
            </div>
            
            <!-- Botão de logout -->
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

    <!-- Barra de Pesquisa -->
    <div class="search-bar mt-4">
        <input type="text" class="form-control" placeholder="Pesquisar...">
    </div>

    <!-- Lista de Empresas -->
    <section class="categories mt-4">
        <h4>Perto de você!</h4>
        <div class="items">
            @foreach ($empresas as $empresa)
                <div class="item">
                    <img src="{{ asset('images/' . $empresa['imagem']) }}" alt="{{ $empresa['nome'] }}">
                    <div>
                        <p>{{ $empresa['nome'] }}</p>
                        <span class="badge bg-warning text-dark">{{ $empresa['nota'] }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Categorias -->
    <section class="categories mt-4">
        @foreach ($categorias as $categoria => $itens)
            <h4 class="category">{{ $categoria }}</h4>
            <div class="items">
                @forelse ($itens as $item)
                    <div class="item">
                        <img src="{{ asset('images/' . $item['imagem']) }}" alt="{{ $item['nome'] }}">
                        <div>
                            <p>{{ $item['nome'] }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Nenhum item disponível.</p>
                @endforelse
            </div>
        @endforeach
    </section>

    <!-- Rodapé -->
    <footer class="bg-dark text-white p-3 mt-5 text-center">
        <p><i class="fas fa-envelope"></i> Quality@gmail.com</p>
        <p><i class="fab fa-instagram"></i> @QualityPlus</p>
        <p><i class="fab fa-whatsapp"></i> (91) 99234-3498</p>
    </footer>
</div>
@endsection
