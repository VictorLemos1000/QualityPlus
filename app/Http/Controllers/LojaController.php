<?php

namespace App\Http\Controllers;

use App\Models\Loja;
use Illuminate\Http\Request;

class LojaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $lojas = Loja::all();

        return view('lojas.index', compact('lojas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('lojas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nome' => 'required|string|max:255',
            'url' => 'required|url|unique:lojas',
            'avaliacao' => 'required|numeric|min:0|max:5',
        ]);

        Loja::create($request->all());

        return redirect()->route('lojas.index')->with('sucess', 'Loja criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $loja = Loja::findOrFail($id);

        return view('lojas.show', compact('loja'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $loja = Loja::findOrFail($id);

        return view('lojas.form', compact('loja'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $loja = Loja::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255',
            'url' => 'required|url|unique:lojas,url,' . $loja->id,
            'avaliacao' => 'required|numeric|min:0|max:5',
        ]);

        $loja->update($request->all());

        return redirect()->route('lojas.index')->with('sucess', 'Loja atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Loja::destroy($id);

        return redirect()->route('lojas.index')->with('sucess', 'Loja excluída com sucesso!');
    }
}
