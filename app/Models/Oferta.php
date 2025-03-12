<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    //
    use HasFactory;

    protected $fillable = ['produto_id', 'loja_id', 'precos', 'link', 'disponibilidade', 'custo_frete', 'pagamento'];
}
