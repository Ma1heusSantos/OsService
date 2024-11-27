<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Endereco extends Model
{
    use HasFactory;

    protected $table = 'endereco';

    protected $fillable = [
        'rua', 'numero', 'bairro', 'complemento', 'cidade', 'estado', 'cep',
    ];

    public function enderecavel()
    {
        return $this->morphTo();
    }

}