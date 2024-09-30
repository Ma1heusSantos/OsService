<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'razao_social',
        'cnpj',
    ];

    public function endereco():HasOne
    {
        return $this->hasOne(Endereco::class);
    }
}