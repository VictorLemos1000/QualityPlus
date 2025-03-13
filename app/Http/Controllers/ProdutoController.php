<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // Método para listar produtos
    public function index()
    {
        //
        $produtos = Produto::all();
        return response()->json($produtos);
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
        $produto = Produto::with('ofertas.loja')->findOrFail($id);
        return response()->json($produto);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        // Busca o produto pelo ID ou retorna um erro 404 se não encontrado
        $produto = Produto::findOrFail($id);

        // Retorna a view de edição, passando os dados do produto
        return view('produtos.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $produto = Produto::findOrFail($id);

        $request->validate([
            'nome' => 'sometimes|string|max:255',
            'descricao' => 'nullable|string',
            'categoria' => 'sometimes|string',
            'marca' => 'nullable|string',
            'imagem_url' => 'nullable|url',
        ]);

        $produto->update($request->all());
        return response()->json($produto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return response()->json(null, 204);
    }

    // Buscar produtos (para o comparador de preços)
    public function buscar(Request $request)
    {
        // Validação do termo de busca (opcional)
        $request->validate([
            'termo' => 'required|string|min:3',
        ]);

        // Recupera o termo de busca
        $termo = $request->input('termo');

        // Busca produtos pelo nome ou descrição
        $produtos = Produto::where('nome', 'LIKE', "%{$termo}%")
            ->orWhere('descricao', 'LIKE', "%{$termo}%")
            ->with('ofertas.loja') // Carrega as ofertas e lojas relacionadas
            ->get();

            // Retorna os resultados (pode ser JSON ou uma view)
            return response()->json($produtos); // Ou return view('produtos.buscar', compact('produtos'));
            // Retorna a view com os dados
    }

    public function compararPrecos(Request $request)
    {
        // Busca produtos com suas ofertas e lojas relacionadas
        $produtos = Produto::with(['ofertas.loja'])
            ->get();

        // Retorna a view com os dados
        return view('comparador.index', compact('produtos'));
    }

    public function historico($id)
    {
        // Busca o produto pelo ID com seu histórico de preços
        $produto = Produto::with(['ofertas' => function ($query) {
            $query->orderBy('data_oferta', 'desc');
        }])->findOrFail($id);

        // Retorna a view de histórico de preços
        return view('produtos.historico', compact('produto'));
    }
}
