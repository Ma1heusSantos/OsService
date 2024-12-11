<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mecanico extends Model
{
    use HasFactory;
    use SoftDeletes;
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

    public function user():BelongsTo
    {
        return $this->belongsTo(ServiceOrder::class,'user_id');
    }

    public function serviceOrder(): HasOne
    {
        return $this->hasOne(ServiceOrder::class);
    }
}