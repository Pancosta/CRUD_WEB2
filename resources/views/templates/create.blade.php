<head>  
    <style>  
        .bg-dark {
            background-color: #1F2937;
            color: #FFFFFF;
        }
    </style>    
<head>
@extends('layouts.app')

@section('content')                                   
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-white-2xl font-bold">Criar Novo Template</h2>
        <a class="inline-block py-2 px-4 text-white bg-blue-500 hover:bg-blue-600 rounded" href="{{ route('templates.index') }}">Voltar</a>
    </div>
    @if ($errors->any())
        <div class="bg-red-100 text-red-900 rounded-md p-4 mb-8">
            <strong>Ops!</strong> Ocorreu um erro com os dados informados.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="max-w-lg mx-auto mb-8">
        <form action="{{ route('templates.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="nome" class="block text-white-700 font-bold mb-2">Nome:</label>
                <input type="text" name="nome" id="nome" class="w-full border-gray-400 border-2 rounded px-3 py-2" placeholder="Informe o nome">
            </div>

            <div class="mb-8">
                <label for="modelo" class="block text-white-700 font-bold mb-2">Modelo:</label>
                <input type="text" name="modelo" id="modelo" class="w-full border-gray-400 border-2 rounded px-3 py-2" placeholder="Informe o modelo">
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Salvar</button>
            </div>

        </form>
    </div>

@endsection
