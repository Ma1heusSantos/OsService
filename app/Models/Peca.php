<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\CategoriaPeca;

class Peca extends Model
{
    use HasFactory;
    protected $table="peca";

    protected $fillable =[
        'cod_peca',
        'nome',
        'preco',
        'categoria_id',
        'empresa_id'
    ];

    public function categoriaPeca():BelongsTo{
        return $this->belongsTo(CategoriaPeca::class, 'categoria_id');
    }
}