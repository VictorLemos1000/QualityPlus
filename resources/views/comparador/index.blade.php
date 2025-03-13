@extends('layouts.app')

@section('content')
    <style>
    /* Estilo para as estrelas de avaliação */
    .fa-star.checked {
            color: orange;
        }

        /* Estilo para os badges de classificação */
        .badge {
            font-size: 0.9em;
            margin-bottom: 10px;
        }

        /* Estilo para os cards de ofertas */
        .card-oferta {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-oferta .card-body {
            padding: 15px;
        }

        .card-oferta .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .card-oferta .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>

<div class="container">
    <h1 class="my-4">Comparador de Preços</h1>

    @foreach($produtos as $produto)
        <div class="card mb-4">
            <div class="card-header">
                <h2>{{ $produto->nome }}</h2>
                <p class="mb-0">{{ $produto->descricao }}</p>
            </div>
            <div class="card-body">
                <h3>Ofertas:</h3>
                <div class="row">
                    @foreach($produto->ofertas as $index => $oferta)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        @if($index === 0)
                                            <span class="badge bg-success">1° Melhor Escolha</span>
                                        @elseif($index === 1)
                                            <span class="badge bg-warning">2° Melhor Escolha</span>
                                        @else
                                            <span class="badge bg-info">Melhor Escolha Favorita</span>
                                        @endif
                                    </h5>
                                    <p class="card-text">
                                        <strong>Loja:</strong> {{ $oferta->loja->nome }}<br>
                                        <strong>Avaliação:</strong>
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $oferta->loja->avaliacao)
                                                <span class="fa fa-star checked"></span>
                                            @else
                                                <span class="fa fa-star"></span>
                                            @endif
                                        @endfor
                                        ({{ $oferta->loja->avaliacao }})
                                    </p>
                                    <p class="card-text">
                                        <strong>Preço:</strong> R$ {{ number_format($oferta->preco, 2, ',', '.') }}
                                    </p>
                                    <a href="{{ $oferta->url_oferta }}" target="_blank" class="btn btn-primary">
                                        Ver Oferta
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
