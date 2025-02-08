<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Simulando dados de empresas e produtos para exibição
        $empresas = [
            ['nome' => 'Mix Mateus', 'imagem' => 'mix_mateus.png', 'nota' => 4.5],
            ['nome' => 'Loja Exemplo', 'imagem' => 'loja_exemplo.png', 'nota' => 4.3],
        ];

        $categorias = [
            'Alimentos' => [
                ['nome' => 'Maçã', 'imagem' => 'maca.png'],
            ],
            'Artesanato' => [],
            'Tecnologia' => [],
        ];

        return view('dashboard', compact('empresas', 'categorias'));
    }
}
