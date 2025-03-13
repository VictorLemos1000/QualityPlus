<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loja extends Model
{
    //
    protected $fillable = ['nome', 'url', 'avaliacao', 'localizacao'];

    public function ofertas()
    {
        return $this->hasMany(Oferta::class);
    }
}
