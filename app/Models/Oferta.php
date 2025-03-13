<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    //
    protected $fillable = ['produto_id', 'loja_id', 'preco', 'data_oferta', 'url_oferta', 'disponibilidade'];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function loja()
    {
        return $this->belongsTo(Loja::class);
    }
}
