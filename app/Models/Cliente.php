<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable =[
        'nome',
        'cpf',
        'telefone',
        'razao_social',
        'cnpj',
        'ie',
    ];

    public function endereco():HasOne
    {
        return $this->hasOne(Endereco::class);
    }
}