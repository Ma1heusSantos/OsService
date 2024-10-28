<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'cpf',
        'cnpj',
        'telefone',
        'celular',
        'razao_social',
        'ie',
        'empresa_id'
    ];
    protected $table = 'cliente';

    public function endereco():HasOne
    {
        return $this->hasOne(Endereco::class);
    }
    public function empresa():BelongsTo
    {
        return $this->belongsTo(Empresa::class,'empresa_id');
    }

    public function serviceOrders():hasMany
    {
        return $this->hasMany(ServiceOrder::class);
    }
}