<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'empresa_id',
        'rua',
        'numero',
        'bairro',
        'complemento',
        'cidade',
        'estado',
        'cep',
        'cliente_id'
    ];

    public function cliente():BelongsTo
    {
        return $this->belongsTo(Cliente::class,'cliente_id');
    }

    public function empresa():BelongsTo
    {
        return $this->belongsTo(Endereco::class,'empresa_id');
    }
}