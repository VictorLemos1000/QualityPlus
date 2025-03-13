@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Cadastrar Nova Oferta</h1>

    <form action="{{ route('ofertas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="produto_id">Produto</label>
            <select name="produto_id" id="produto_id" class="form-control" required>
                @foreach($produtos as $produto)
                    <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="loja_id">Loja</label>
            <select name="loja_id" id="loja_id" class="form-control" required>
                @foreach($lojas as $loja)
                    <option value="{{ $loja->id }}">{{ $loja->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number" name="preco" id="preco" class="form-control" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="data_oferta">Data da Oferta</label>
            <input type="date" name="data_oferta" id="data_oferta" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="url_oferta">URL da Oferta</label>
            <input type="url" name="url_oferta" id="url_oferta" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="disponibilidade">Disponibilidade</label>
            <select name="disponibilidade" id="disponibilidade" class="form-control" required>
                <option value="1">Disponível</option>
                <option value="0">Esgotado</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
@endsection
