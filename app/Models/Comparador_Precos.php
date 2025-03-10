<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comparador_Precos extends Model
{
    //
    protected $fillable = ['rank_melhor_escolha', 'estabelecimento', 'classificacao', 'nome_produto', 'preco'];
}
