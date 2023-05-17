@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-bold">Editar Cliente</h2>
        <a class="inline-block py-2 px-4 text-white bg-blue-500 hover:bg-blue-600 rounded" href="{{ route('clientes.index') }}">Voltar</a>
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

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST" class="max-w-lg mx-auto">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nome" class="block text-gray-700 font-bold mb-2">Nome:</label>
            <input type="text" name="nome" id="nome" class="w-full border-gray-400 border-2 rounded px-3 py-2" value="{{ $cliente->nome }}" placeholder="Informe o nome">
        </div>

        <div class="mb-4">
            <label for="user_id" class="block text-gray-700 font-bold mb-2">Usuário:</label>
            <select name="user_id" id="user_id" class="w-full border-gray-400 border-2 rounded px-3 py-2">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $cliente->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
                <label for="sexo" class="block text-gray-700 font-bold mb-2">Sexo:</label>
                <select name="sexo" id="sexo" class="w-full border-gray-400 border-2 rounded px-3 py-2">
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Outro">Outro</option>
                </select>
            </div>

        <div class="mb-4">
            <label for="endereco" class="block text-gray-700 font-bold mb-2">Endereço:</label>
            <input type="text" name="endereco" id="endereco" value="{{ $cliente->endereco }}" class="w-full border-gray-400 border-2 rounded px-3 py-2" placeholder="Endereço">
        </div>

        <div class="mb-4">
            <label for="telefone" class="block text-gray-700 font-bold mb-2">Telefone:</label>
            <input type="text" name="telefone" id="telefone" value="{{ $cliente->telefone }}" class="w-full border-gray-400 border-2 rounded px-3 py-2" placeholder="Telefone">
        </div>

        <div class="mb-8">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
            <input type="email" name="email" id="email" value="{{ $cliente->email }}" class="w-full border-gray-400 border-2 rounded px-3 py-2" placeholder="Email">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Salvar
            </button>
        </div>
    </form>
@endsection
