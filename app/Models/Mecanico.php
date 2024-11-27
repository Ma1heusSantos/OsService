<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Mecanico extends Model
{
    use HasFactory;
    protected $table = 'mecanicos';
    protected $fillable =[
        'nome',
        'telefone',
        'cpf',
        'especialidade',
        'status',
        'data_nascimento',
        'endereco_id',
        'empresa_id'
      
    ];

    public function endereco()
    {
        return $this->morphOne(Endereco::class, 'enderecavel');
    }
}