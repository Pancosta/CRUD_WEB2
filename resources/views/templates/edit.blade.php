@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h2 class="text-2xl font-bold">Editar Template</h2>
    <a class="inline-block py-2 px-4 text-white bg-blue-500 hover:bg-blue-600 rounded" href="{{ route('templates.index') }}">Voltar</a>
</div>

@if ($errors->any())
    <div class="bg-red-100 text-red-900 rounded-md p-4 mb-8">
        <strong>Ops!</strong> Houve alguns problemas com os seus dados.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('templates.update', $template->id) }}" method="POST" class="max-w-lg mx-auto">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label for="nome" class="block text-gray-700 font-bold mb-2">Nome:</label>
        <input type="text" name="nome" id="nome" value="{{ $template->nome }}" class="w-full border-gray-400 border-2 rounded px-3 py-2" placeholder="Nome">
    </div>

    <div class="mb-8">
        <label for="modelo" class="block text-gray-700 font-bold mb-2">Modelo:</label>
        <textarea name="modelo" id="modelo" class="w-full border-gray-400 border-2 rounded px-3 py-2" rows="10">{{ $template->modelo }}</textarea>
    </div>

    <div class="flex justify-end">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
            Salvar
        </button>
    </div>
</form>
@endsection
