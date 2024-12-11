<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'razao_social',
        'cnpj',
    ];

    protected $table = 'empresa';

    public function endereco()
    {
        return $this->morphOne(Endereco::class, 'enderecavel');
    }
    public function clientes():HasMany
    {
        return $this->hasMany(Cliente::class);
    }
}