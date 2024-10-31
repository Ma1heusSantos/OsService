<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $table ="service_order";



    public function cliente():BelongsTo
    {
        return $this->belongsTo(Cliente::class,'cliente_id');
    }

    public function categoriaServico():BelongsTo
    {
        return $this->belongsTo(CategoriaServico::class,'categoria_id');
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(Cliente::class,'user_id');
    }
}