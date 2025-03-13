@extends('layouts.app')

@section('content')
<style>
    /* Estilo para a tabela de ofertas */
    .table-ofertas {
        width: 100%;
        margin-bottom: 0;
    }

    .table-ofertas th, .table-ofertas td {
        vertical-align: middle;
    }

    .table-ofertas .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .table-ofertas .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>

<div class="container">
    <h1 class="my-4">{{ $produto->nome }}</h1>
    <p>{{ $produto->descricao }}</p>

    <h2>Ofertas:</h2>
    <table class="table table-ofertas">
        <thead>
            <tr>
                <th>Loja</th>
                <th>Preço</th>
                <th>Disponibilidade</th>
                <th>Link</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produto->ofertas as $oferta)
                <tr>
                    <td>{{ $oferta->loja->nome }}</td>
                    <td>R$ {{ number_format($oferta->preco, 2, ',', '.') }}</td>
                    <td>{{ $oferta->disponibilidade ? 'Disponível' : 'Esgotado' }}</td>
                    <td>
                        <a href="{{ $oferta->url_oferta }}" target="_blank" class="btn btn-primary btn-sm">
                            Ver Oferta
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
