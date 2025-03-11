@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($loja) ? 'Editar Loja' : 'Cadastrar Loja' }}</h1>

    <form action="{{ isset($loja) ? route('lojas.update', $loja->id) : route('lojas.store') }}" method="POST">
        @csrf
        @if(isset($loja))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $loja->nome ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">URL</label>
            <input type="url" name="url" class="form-control" value="{{ $loja->url ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Avaliação (0 a 5)</label>
            <input type="number" name="avaliacao" class="form-control" step="0.1" min="0" max="5" value="{{ $loja->avaliacao ?? '' }}" required>
        </div>

        <button type="submit" class="btn btn-success">{{ isset($loja) ? 'Atualizar' : 'Cadastrar' }}</button>
        <a href="{{ route('lojas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
