<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =[
        'name',
        'cpf',
        'cnpj',
        'telefone',
        'celular',
        'razao_social',
        'ie',
        'email',
        'empresa_id'
    ];
    protected $table = 'cliente';

    public function endereco()
    {
        return $this->morphOne(Endereco::class, 'enderecavel');
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