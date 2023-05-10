<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;

class TemplateController extends Controller
{

    public function index()
    {
        $templates = Template::latest()->paginate(5);
  
        return view('templates.index',compact('templates'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('templates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'modelo' => 'required',
        ]);

        Template::create($request->all());

        return redirect()->route('templates.index')
            ->with('success', 'Template criado com sucesso!');
    }

    public function edit(Template $template)
    {
        return view('templates.edit', compact('template'));
    }

    public function update(Request $request, Template $template)
    {
        $request->validate([
            'nome' => 'required',
            'modelo' => 'required',
        ]);

        $template->update($request->all());

        return redirect()->route('templates.index')
            ->with('success', 'Template atualizado com sucesso!');
    }

    public function destroy(Template $template)
    {
        $template->delete();

        return redirect()->route('templates.index')
            ->with('success', 'Template excluído com sucesso!');
    }
}
