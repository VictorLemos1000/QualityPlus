@extends('layouts.app')

@section('title', ucfirst($categoria))

@section('content')

<style>
    .container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 0 15px;
    }

    .header-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .header-logo img,
    .header-perfil img {
        height: 50px;
        cursor: pointer;
        border-radius: 8px;
        transition: transform 0.3s ease;
    }

    .header-logo img:hover,
    .header-perfil img:hover {
        transform: scale(1.05);
    }

    /* Para a logo/perfil no topo que são imagens, deixamos só o clique */
    .header-perfil {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .header-perfil span {
        font-weight: 600;
        color: #004A99;
    }

    /* Grid dos cards */
    .produtos-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 24px;
    }

    .card-produto {
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        overflow: hidden;
        padding: 16px;
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease;
    }

    .card-produto:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .card-produto-img {
        width: 100%;
        height: 160px;
        object-fit: cover;
        border-radius: 12px;
        margin-bottom: 14px;
    }

    .card-produto-titulo {
        font-size: 20px;
        font-weight: 700;
        color: #004A99;
        margin-bottom: 6px;
        text-align: center;
    }

    .card-produto-preco {
        color: #00B88A;
        font-weight: 700;
        font-size: 18px;
        margin-bottom: 8px;
        text-align: center;
    }

    .card-produto-quantidade,
    .card-produto-categoria,
    .card-produto-desc {
        font-size: 14px;
        color: #555;
        margin-bottom: 6px;
        text-align: center;
        line-height: 1.3;
    }

    .btn-custom {
        background-color: #006BE6;
        color: white;
        padding: 10px 16px;
        border-radius: 10px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        text-align: center;
        transition: background-color 0.3s ease;
        margin-top: auto;
        text-decoration: none;
    }

    .btn-custom:hover {
        background-color: #004A99;
    }

    /* Responsivo */
    @media(max-width: 768px) {
        .header-top {
            flex-direction: column;
            gap: 16px;
            align-items: flex-start;
        }
    }

</style>

<section class="container">

    <!-- Header com logo principal e logo do perfil -->
    <div class="header-top">
        <div class="header-logo">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('images/Qualityplus.png') }}" alt="QualityPlus Logo">
            </a>
        </div>
        <div class="header-perfil">
            <a href="{{ route('perfil') }}">
                <img src="{{ asset('images/perfil.png') }}" alt="Perfil Logo">
            </a>
        </div>
    </div>

    <h1 class="text-center mb-5" style="font-size: 32px; font-weight: bold; color: #004A99;">
        {{ ucfirst($categoria) }}
    </h1>

    @if($produtos->count())
        <div class="produtos-grid">
            @foreach($produtos as $produto)
                <div class="card-produto">
                    <img src="{{ asset('storage/' . $produto->imagem) }}" 
                         alt="{{ $produto->nome }}" 
                         class="card-produto-img">
                    
                    <h4 class="card-produto-titulo">
                        {{ $produto->nome }}
                    </h4>
                    
                    @if($produto->preco)
                        <p class="card-produto-preco">
                            R$ {{ number_format($produto->preco, 2, ',', '.') }}
                        </p>
                    @endif
                    
                    <p class="card-produto-quantidade">
                        Quantidade disponível: {{ $produto->quantidade }}
                    </p>
                    
                    <p class="card-produto-categoria">
                        Categoria: {{ ucfirst($produto->categoria) }}
                    </p>
                    
                    <p class="card-produto-desc">
                        {{ \Illuminate\Support\Str::limit($produto->descricao, 80) }}
                    </p>
                    
                    <a href="{{ route('produto.show', $produto->id) }}" class="btn-custom">
                        Ver Detalhes
                    </a>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center" style="color: #666; font-size: 18px;">
            Nenhum produto encontrado nesta categoria.
        </p>
    @endif

</section>

@endsection
