@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-2xl font-bold mb-4">Lista de Templates</h2>
    <a href="{{ route('templates.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4">Novo Template</a>

    @if ($templates)
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Nome</th>
                <th class="px-4 py-2">Modelo</th>
                <th class="px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($templates as $template)
            <tr>
                <td class="border px-4 py-2">{{ $template->id }}</td>
                <td class="border px-4 py-2">{{ $template->nome }}</td>
                <td class="border px-4 py-2">{{ $template->modelo }}</td>
                <td class="border px-4 py-2">
                    <form action="{{ route('templates.destroy', $template->id) }}" method="POST">
                        <a href="{{ route('templates.edit', $template->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Tem certeza que deseja excluir este template?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $templates->links() }}
    @else
    <p>Nenhum template encontrado.</p>
    @endif
</div>
@endsection
