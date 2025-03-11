@extends('layouts.app')

@section('title', 'Página Inicial')

@section('content')
<div class="container dashboard-container">
    <!-- Cabeçalho com navegação -->
    <header class="d-flex justify-content-between align-items-center header-custom">
<<<<<<< Updated upstream
<<<<<<< Updated upstream
        <div class="logo">
            <a href="{{ auth()->check() ? route('dashboard') : route('home') }}">
                <span class="green">Quality</span><span class="blue">Plus+</span>
            </a>
        </div>
=======
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('images/Qualityplus.png') }}" alt="QualityPlus Logo" class="profile-logo">
        </a>
>>>>>>> Stashed changes
=======
        <a href="{{ route('dashboard') }}">
            <img src="{{ asset('images/Qualityplus.png') }}" alt="QualityPlus Logo" class="profile-logo">
        </a>
>>>>>>> Stashed changes
        <nav class="nav-custom">
            <ul class="d-flex list-unstyled m-0">
                <li><a href="{{ route('about') }}">Sobre</a></li>
                <li><a href="{{ route('contact') }}">Contato</a></li>
            </ul>
        </nav>

        <!-- Ícone de perfil e logout -->
        <div class="profile-logout d-flex align-items-center">
<<<<<<< Updated upstream
<<<<<<< Updated upstream
            <div class="profile-icon">
                <img src="{{ asset('images/perfil.png') }}" alt="Perfil" class="rounded-circle" width="40" height="40">
            </div>
=======
=======
>>>>>>> Stashed changes
            <a href="{{ route('perfil') }}">
                <img src="{{ auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) . '?t=' . uniqid() : asset('images/Perfil.png') }}" 
                     alt="Mini Perfil" 
                     class="header-profile-image" 
                     id="header-profile-image">
            </a>
<<<<<<< Updated upstream
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
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

   <!-- Lista de Empresas -->
<section class="categories mt-4">
    <h4 class="highlight-title">Perto de você!</h4>
    <div class="carousel-container">
        <div class="carousel-items">
            @foreach ($empresas as $empresa)
                <div class="carousel-item">
                    <a href="{{ route('empresa.sobre', ['id' => $empresa->id]) }}" class="item-link">
                        <div class="item-card">
                            <!-- Imagem da Empresa -->
                            <img src="{{ asset('storage/' . $empresa->imagem) }}" alt="{{ $empresa->nome }}" class="img-fluid rounded">
                            <div class="item-info">
                                <!-- Nome da Empresa -->
                                <p class="item-name">{{ $empresa->nome }}</p>
                                <!-- Status da Empresa -->
                                <span class="badge bg-warning text-dark">
                                    {{ $empresa->status ? 'Ativa' : 'Inativa' }}
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <!-- Setas de Navegação -->
        <button class="carousel-prev" id="carousel-prev">&#10094;</button>
        <button class="carousel-next" id="carousel-next">&#10095;</button>
    </div>
</section>


    <!-- Nova Seção de Produtos (Visualização) -->
    <section class="products mt-5">
        <h4 class="highlight-title">Produtos em Destaque</h4>
        <div class="carousel-container">
            <div class="carousel-items">
                <!-- Card de Produto Exemplo 1 -->
                <div class="col-md-2 mb-4 carousel-item">
                    <a href="#" class="product-link">
                        <div class="product-card">
                            <img src="https://via.placeholder.com/400x300" alt="Produto Exemplo 1" class="img-fluid rounded">
                            <div class="product-info">
                                <p class="product-name">Produto Exemplo 1</p>
                                <span class="product-price">R$ 99,99</span>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Card de Produto Exemplo 2 -->
                <div class="col-md-2 mb-4 carousel-item">
                    <a href="#" class="product-link">
                        <div class="product-card">
                            <img src="https://via.placeholder.com/400x300" alt="Produto Exemplo 2" class="img-fluid rounded">
                            <div class="product-info">
                                <p class="product-name">Produto Exemplo 2</p>
                                <span class="product-price">R$ 149,99</span>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Card de Produto Exemplo 3 -->
                <div class="col-md-2 mb-4 carousel-item">
                    <a href="#" class="product-link">
                        <div class="product-card">
                            <img src="https://via.placeholder.com/400x300" alt="Produto Exemplo 3" class="img-fluid rounded">
                            <div class="product-info">
                                <p class="product-name">Produto Exemplo 3</p>
                                <span class="product-price">R$ 89,90</span>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Card de Produto Exemplo 4 -->
                <div class="col-md-2 mb-4 carousel-item">
                    <a href="#" class="product-link">
                        <div class="product-card">
                            <img src="https://via.placeholder.com/400x300" alt="Produto Exemplo 4" class="img-fluid rounded">
                            <div class="product-info">
                                <p class="product-name">Produto Exemplo 4</p>
                                <span class="product-price">R$ 199,99</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <button class="carousel-prev" id="carousel-prev-products">&#10094;</button>
            <button class="carousel-next" id="carousel-next-products">&#10095;</button>
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

<<<<<<< Updated upstream
<<<<<<< Updated upstream
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

    /* Logo */
    .logo a {
        text-decoration: none;
        font-size: 24px;
        font-weight: bold;
    }
    .logo .green {
        color: #00B88A;
    }
    .logo .blue {
        color: #006BE6;
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
=======
=======
>>>>>>> Stashed changes
/* Cabeçalho */
.header-custom {
    background-color: white;
    padding: 15px 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
}

/* Navegação */
.nav-custom ul {
    gap: 20px;
}

.nav-custom a {
    text-decoration: none;
    font-weight: bold;
    color: #fff;
    padding: 8px 12px;
    transition: 0.3s;
    background: linear-gradient(to right, #006BE6, #007CE0);
    border-radius: 25px;
}

.nav-custom a:hover {
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

/* Ajustes para o Perfil */
.header-profile-image {
    max-width: 45px;
    height: 45px;
    border-radius: 50%;
    object-fit: cover;
}

/* Logo */
.profile-logo {
    max-width: 150px; /* Ajuste do tamanho da logo */
    height: auto;
}

/* Ajustes para os cartões e produtos */
.carousel-container {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
<<<<<<< Updated upstream
=======
}

.carousel-items {
    display: flex;
    transition: transform 0.3s ease;
    flex-wrap: nowrap;
}

.carousel-item {
    width: 150px; 
    margin-right: 10px;
    flex-shrink: 0;
}

.item-card, .product-card {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    overflow: hidden;
}

.item-card img, .product-card img {
    width: 100%;
    height: 120px;
    object-fit: cover;
}

.item-info, .product-info {
    padding: 10px;
    text-align: center;
}

.item-name, .product-name {
    font-weight: bold;
    font-size: 12px;
}

.product-price {
    color: #006BE6;
    font-size: 12px;
    font-weight: bold;
}

.highlight-title {
    font-size: 16px; /* Títulos menores */
    font-weight: bold;
    color: #000;
    text-align: left;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Setas de Navegação */
.carousel-prev, .carousel-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 10px;
    font-size: 20px;
    cursor: pointer;
    z-index: 10;
    border-radius: 50%;
}

.carousel-prev {
    left: 10px;
}

.carousel-next {
    right: 10px;
}

/* Ajustes Responsivos */
@media (max-width: 768px) {
    .carousel-item {
        width: 130px;
    }
}

@media (max-width: 576px) {
    .carousel-item {
        width: 110px;
    }
>>>>>>> Stashed changes
}

.carousel-items {
    display: flex;
    transition: transform 0.3s ease;
    flex-wrap: nowrap;
}

.carousel-item {
    width: 150px; 
    margin-right: 10px;
    flex-shrink: 0;
}

.item-card, .product-card {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    overflow: hidden;
}

.item-card img, .product-card img {
    width: 100%;
    height: 120px;
    object-fit: cover;
}

.item-info, .product-info {
    padding: 10px;
    text-align: center;
}

.item-name, .product-name {
    font-weight: bold;
    font-size: 12px;
}

.product-price {
    color: #006BE6;
    font-size: 12px;
    font-weight: bold;
}

.highlight-title {
    font-size: 16px; /* Títulos menores */
    font-weight: bold;
    color: #000;
    text-align: left;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Setas de Navegação */
.carousel-prev, .carousel-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 10px;
    font-size: 20px;
    cursor: pointer;
    z-index: 10;
    border-radius: 50%;
}

.carousel-prev {
    left: 10px;
}

.carousel-next {
    right: 10px;
}

/* Ajustes Responsivos */
@media (max-width: 768px) {
    .carousel-item {
        width: 130px;
    }
}

@media (max-width: 576px) {
    .carousel-item {
        width: 110px;
    }
}
>>>>>>> Stashed changes
</style>
@endpush

@push('scripts')
<script>
    document.getElementById('carousel-next').addEventListener('click', function () {
        let items = document.querySelector('.carousel-items');
        items.style.transform = 'translateX(-100%)';
    });

    document.getElementById('carousel-prev').addEventListener('click', function () {
        let items = document.querySelector('.carousel-items');
        items.style.transform = 'translateX(0)';
    });

    document.getElementById('carousel-next-products').addEventListener('click', function () {
        let items = document.querySelector('.carousel-items');
        items.style.transform = 'translateX(-100%)';
    });

    document.getElementById('carousel-prev-products').addEventListener('click', function () {
        let items = document.querySelector('.carousel-items');
        items.style.transform = 'translateX(0)';
    });
</script>
@endpush
