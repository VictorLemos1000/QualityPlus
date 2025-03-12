<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use Carbon\Exceptions\RuntimeException;
use Dotenv\Exception\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $oferta = Oferta::all();
            return view('ofertas.index', compact('ofertas'));
        } catch (RuntimeException $excecao) {
            return back()->withErrors('Erro ao listar ofertas: ' . $excecao);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('ofertas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $request->validate([
                'produto_id' => 'required|exists:produtos,id',
                'loja_id' => 'required|exists:lojas,id',
                'preco' => 'required|numeric|min:0',
                'link' => 'required|url',
                'disponibilidade' => 'required|boolean',
                'custo_frete' => 'nullable|numeric|min:0',
                'metodo_pagamento' => 'required|string',
            ]);

            Oferta::create($request->all());
            return redirect()->route('ofertas.index')->with('success', 'Oferta criada com sucesso!');
        } catch (ValidationException $excecao) {
            return back()->withErrors($excecao)->withInput();
        } catch (RuntimeException $excecao) {
            return back()->withErrors('Erro ao criar oferta: ' . $excecao)->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
         try {
            $oferta = Oferta::findOrFail($id);
            return view('ofertas.show', compact('oferta'));
        } catch (ModelNotFoundException $eexcecao) {
            return redirect()->route('ofertas.index')->withErrors('Oferta não encontrada.');
        } catch (RuntimeException $excecao) {
            return back()->withErrors('Erro ao exibir a oferta: ' . $excecao);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        try {
            $oferta = Oferta::findOrFail($id);
            return view('ofertas.edit', compact('oferta'));
        } catch (ModelNotFoundException $excecao) {
            return redirect()->route('ofertas.index')->withErrors('Oferta não encontrada.');
        } catch (RuntimeException $excecao) {
            return back()->withErrors('Erro ao carregar edição: ' . $excecao);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $request->validate([
                'produto_id' => 'required|exists:produtos,id',
                'loja_id' => 'required|exists:lojas,id',
                'preco' => 'required|numeric|min:0',
                'link' => 'required|url',
                'disponibilidade' => 'required|boolean',
                'custo_frete' => 'nullable|numeric|min:0',
                'metodo_pagamento' => 'required|string',
            ]);

            $oferta = Oferta::findOrFail($id);
            $oferta->update($request->all());
            return redirect()->route('ofertas.index')->with('success', 'Oferta atualizada com sucesso!');
        } catch (ModelNotFoundException $excecao) {
            return redirect()->route('ofertas.index')->withErrors('Oferta não encontrada.');
        } catch (ValidationException $excecao) {
            return back()->withErrors($excecao)->withInput();
        } catch (RuntimeException $excecao) {
            return back()->withErrors('Erro ao atualizar a oferta: ' . $excecao)->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $oferta = Oferta::findOrFail($id);
            $oferta->delete();
            return redirect()->route('ofertas.index')->with('success', 'Oferta deletada com sucesso!');
        } catch (ModelNotFoundException $excecao) {
            return redirect()->route('ofertas.index')->withErrors('Oferta não encontrada.');
        } catch (RuntimeException $excecao) {
            return back()->withErrors('Erro ao excluir a oferta: ' . $excecao);
        }
    }
}
