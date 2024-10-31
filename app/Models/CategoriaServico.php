<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoriaServico extends Model
{
    use HasFactory;

    protected $table='categoria_servico';

    public function serviceOrders():HasMany
    {
        return $this->hasMany(ServiceOrder::class);
    }
}