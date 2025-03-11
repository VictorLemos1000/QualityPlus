<?php

namespace App\Http\Controllers;

use App\Models\Loja;
use Exception;
use Illuminate\Http\Request;
use RuntimeException;

class LojaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            //code...
            $lojas = Loja::all();

            return view('lojas.index', compact('lojas'));
        } catch (RuntimeException $excecao) {
            //throw $th;
            return back()->withErrors('Erro ao listar lojas: ',  $excecao->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        try {
            //code...
            return view('lojas.create');
        } catch (RuntimeException $excecao) {
            //throw $th;
            return back()->withErrors('Erro ao carregar o formulário: ' . $excecao->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            //code...
            $request->validate([
                'nome' => 'required|string|max:255',
                'url' => 'required|url|unique:lojas',
                'avaliacao' => 'required|numeric|min:0|max:5',
            ]);

            Loja::create($request->all());

            return redirect()->route('lojas.index')->with('sucess', 'Loja criada com sucesso!');
        } catch (RuntimeException $excecao) {
            //throw $th;
            return back()->withErrors('Erro ao criar loja', $excecao->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try {
            //code...
            $loja = Loja::findOrFail($id);

            return view('lojas.show', compact('loja'));
        } catch (RuntimeException $excecao) {
            //throw $th;
            return back()->withErrors('Erro ao vizualizar loja: ', $excecao->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        try {
            //code...
            $loja = Loja::findOrFail($id);

            return view('lojas.form', compact('loja'));
        } catch (RuntimeException $excecao) {
            //throw $th;
            return back()->withErrors('Erro ao carregar formulário de edição: ', $excecao->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            //code...
            $loja = Loja::findOrFail($id);

            $request->validate([
                'nome' => 'required|string|max:255',
                'url' => 'required|url|unique:lojas,url,' . $loja->id,
                'avaliacao' => 'required|numeric|min:0|max:5',
            ]);

            $loja->update($request->all());

            return redirect()->route('lojas.index')->with('sucess', 'Loja atualizada com sucesso!');
        } catch (RuntimeException $excecao) {
            //throw $th;
            return back()->withErrors('Erro ao atualizar loja: ', $excecao->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            //code...
            $loja = Loja::findOrFail($id);
            $loja->delete();

            return redirect()->route('lojas.index')->with('sucess', 'Loja excluída com sucesso!');
        } catch (RuntimeException $excecao) {
            //throw $th;
            return back()->withErrors('Erro ao exluir loja: ', $excecao->getMessage());
        }
    }
}
