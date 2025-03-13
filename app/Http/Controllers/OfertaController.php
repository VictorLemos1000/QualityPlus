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
        $ofertas = Oferta::with(['produto', 'loja'])->get();
        return response()->json($ofertas);
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
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'loja_id' => 'required|exists:lojas,id',
            'preco' => 'required|numeric',
            'data_oferta' => 'required|date',
            'url_oferta' => 'required|url',
            'disponibilidade' => 'required|boolean',
        ]);

        $oferta = Oferta::create($request->all());
        return response()->json($oferta, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $oferta = Oferta::with(['produto', 'loja'])->findOrFail($id);
        return response()->json($oferta);
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
        $oferta = Oferta::findOrFail($id);

        $request->validate([
            'produto_id' => 'sometimes|exists:produtos,id',
            'loja_id' => 'sometimes|exists:lojas,id',
            'preco' => 'sometimes|numeric',
            'data_oferta' => 'sometimes|date',
            'url_oferta' => 'sometimes|url',
            'disponibilidade' => 'sometimes|boolean',
        ]);

        $oferta->update($request->all());
        return response()->json($oferta);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $oferta = Oferta::findOrFail($id);
        $oferta->delete();
        return response()->json(null, 204);
    }
}
