<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function create()
    {
        return view('empresa.create');
    }

    public function store(Request $request)
    {
        // Verifica se o CNPJ já existe
        $cnpjExistente = Empresa::where('cnpj', $request->cnpj)->first();

        if ($cnpjExistente) {
            return redirect()->back()->with('error', 'CNPJ já cadastrado.');
        }

        // Validação dos campos
        $request->validate([
            'nome'   => 'required|string|max:255',
            'cnpj'   => 'required|string|max:18',  // Ajustado para aceitar CNPJ com 18 caracteres
            'imagem' => 'required|image|max:2048',
            'sobre'  => 'required|string',
        ]);

        // Salvando a imagem no storage
        $imagemPath = $request->file('imagem')->store('empresas', 'public');

        // Criando a empresa no banco de dados
        Empresa::create([
            'nome'   => $request->nome,
            'cnpj'   => $request->cnpj,
            'imagem' => $imagemPath,
            'sobre'  => $request->sobre,
        ]);

        // ✅ Redirecionando para a dashboard com a mensagem de sucesso
        return redirect()->route('dashboard')->with('success', 'Empresa criada com sucesso!');
    }
}
