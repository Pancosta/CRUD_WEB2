@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-2xl font-bold mb-4">Lista de Clientes</h2>
        <a href="{{ route('clientes.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-4">Novo Cliente</a>
        <table class="w-full border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">User</th>
                    <th class="py-2 px-4 border-b">Nome</th>
                    <th class="py-2 px-4 border-b">Sexo</th>
                    <th class="py-2 px-4 border-b">Endereço</th>
                    <th class="py-2 px-4 border-b">Telefone</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $cliente->user->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $cliente->nome }}</td>
                        <td class="py-2 px-4 border-b">{{ $cliente->sexo }}</td>
                        <td class="py-2 px-4 border-b">{{ $cliente->endereco }}</td>
                        <td class="py-2 px-4 border-b">{{ $cliente->telefone }}</td>
                        <td class="py-2 px-4 border-b">{{ $cliente->email }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="text-blue-500 hover:text-blue-600 mr-2">Editar</a>
                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
