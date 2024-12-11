<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaServico extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =[
        'descricao',
    ];

    protected $table='categoria_servico';

    public function serviceOrders():HasMany
    {
        return $this->hasMany(ServiceOrder::class);
    }

    public function servicos():HasMany
    {
        return $this->hasMany(Servicos::class,'categoria_id');
    }
}