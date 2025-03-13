@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Histórico de Preços - {{ $produto->nome }}</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Data</th>
                <th>Preço</th>
                <th>Loja</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produto->ofertas as $oferta)
                <tr>
                    <td>{{ $oferta->data_oferta->format('d/m/Y') }}</td>
                    <td>R$ {{ number_format($oferta->preco, 2, ',', '.') }}</td>
                    <td>{{ $oferta->loja->nome }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
