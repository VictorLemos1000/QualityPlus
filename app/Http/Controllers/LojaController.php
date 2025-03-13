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
        $lojas = Loja::all();
        return response()->json($lojas);
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
        } catch (Exception $excecao) {
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
        $request->validate([
            'nome' => 'required|string|max:255',
            'url' => 'required|url',
            'avaliacao' => 'nullable|numeric',
            'localizacao' => 'nullable|string',
        ]);

        $loja = Loja::create($request->all());
        return response()->json($loja, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $loja = Loja::findOrFail($id);
        return response()->json($loja);
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
        } catch (Exception $excecao) {
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
        $loja = Loja::findOrFail($id);

        $request->validate([
            'nome' => 'sometimes|string|max:255',
            'url' => 'sometimes|url',
            'avaliacao' => 'nullable|numeric',
            'localizacao' => 'nullable|string',
        ]);

        $loja->update($request->all());
        return response()->json($loja);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $loja = Loja::findOrFail($id);
        $loja->delete();
        return response()->json(null, 204);
    }
}
