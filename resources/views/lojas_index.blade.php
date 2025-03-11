@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Lojas</h1>

    <a href="{{ route('lojas.create') }}" class="btn btn-primary mb-3">Cadastrar Nova Loja</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>URL</th>
                <th>Avaliação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lojas as $loja)
                <tr>
                    <td>{{ $loja->id }}</td>
                    <td>{{ $loja->nome }}</td>
                    <td><a href="{{ $loja->url }}" target="_blank">{{ $loja->url }}</a></td>
                    <td>{{ number_format($loja->avaliacao, 1, ',', '.') }}/5</td>
                    <td>
                        <a href="{{ route('lojas.show', $loja->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('lojas.edit', $loja->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('lojas.destroy', $loja->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
