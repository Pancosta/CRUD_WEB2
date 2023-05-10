@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lista de Templates</h2>
        <a href="{{ route('templates.create') }}" class="btn btn-success mb-2">Novo Template</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Modelo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($templates as $template)
                <tr>
                    <td>{{ $template->id }}</td>
                    <td>{{ $template->nome }}</td>
                    <td>{{ $template->modelo }}</td>
                    <td>
                        <form action="{{ route('templates.destroy', $template->id) }}" method="POST">
                            <a href="{{ route('templates.edit', $template->id) }}" class="btn btn-primary">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este template?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $templates->links() }}
        </div>
    </div>
@endsection
