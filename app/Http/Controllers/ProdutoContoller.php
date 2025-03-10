<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // Método para listar produtos
    public function index()
    {
        //
        return response()->json(Produto::all());
    }

    /**
     * Show the form for creating a new resource.
     */

     // This method is a create product
    public function create()
    {
        //
        return response()->json(['massage'=>'Exibir formulário de criação.']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação
        $validated = $request->validate([
            'nome' => 'required|string|max: 255',
            'categotia' => 'required|string|max: 255',
            'accepted' => 'require|numeric',
        ]);

        // Cria e rertorna um novo produto
        $produto = Produto::create($validated);

        return response()->json($produto, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // A palavra Find é um model para chaves primárias
        $produto = Produto::find($id);

        if (!$produto) {
            # code...
            // A palavra response retorna um a nova resposta para a aplicação
            return response()->json(['massage' => 'Produto não encontrado.'], 404);
        }

        return response()->json($produto);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $produto = Produto::find($id);

        if (!$produto) {
            # code...
            return response()->json(['massage' => 'Produto não encontrado.'], 404);
        }

        $validated = $request->validate([
            'nome' => 'required|string|max: 255',
            'categotia' => 'required|string|max: 255',
            'accepted' => 'require|numeric',
        ]);

        $produto->update($validated);

        return response()->json($produto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $produto = Produto::find($id);

        if (!$produto) {
            # code...
            return response()->json(['massage' => 'Produtor não encontrado.', 404]);
        }

        $produto->delete();

        return response()->json(['massage' => 'Produto removiudo com sucesso.']);
    }
}
