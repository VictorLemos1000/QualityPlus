<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    // Define o nome da tabela (opcional, se a tabela for plural e no padrão, não precisa)
    protected $table = 'produtos';

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = [
        'nome',
        'marca',
        'categoria',
        'descricao',
        'preco',
        'imagem',
    ];
}
