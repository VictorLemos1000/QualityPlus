@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Cadastrar Novo Produto</h1>

    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome do Produto</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <input type="text" name="categoria" id="categoria" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" name="marca" id="marca" class="form-control">
        </div>
        <div class="form-group">
            <label for="imagem_url">URL da Imagem</label>
            <input type="url" name="imagem_url" id="imagem_url" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>
@endsection
