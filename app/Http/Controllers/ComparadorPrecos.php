<?php

namespace App\Http\Controllers;

use App\Models\Comparador_Precos;
use Illuminate\Http\Request;

class ComparadorPrecos extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view("comparador_precos.blade.php");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Comparador_Precos $comparador_Precos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comparador_Precos $comparador_Precos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comparador_Precos $comparador_Precos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comparador_Precos $comparador_Precos)
    {
        //
    }
}
