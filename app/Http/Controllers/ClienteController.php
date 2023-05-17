<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\User;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::latest()->paginate(5);
  
        return view('clientes.index', compact('clientes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $users = User::all();
        return view('clientes.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'sexo' => 'required',
            'endereco' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'user_id' => 'required',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente criado com sucesso!');
    }

    public function edit(Cliente $cliente)
    {
        $users = User::all();
        return view('clientes.edit', compact('cliente', 'users'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nome' => 'required',
            'sexo' => 'required',
            'endereco' => 'required',
            'telefone' => 'required',
            'email' => 'required|email',
            'user_id' => 'required',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente excluído com sucesso!');
    }
}
