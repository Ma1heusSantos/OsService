<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'endereco';

    protected $fillable = [
        'rua', 'numero', 'bairro', 'complemento', 'cidade', 'estado', 'cep',
    ];

    public function enderecavel()
    {
        return $this->morphTo();
    }

}