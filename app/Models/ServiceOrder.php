<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $table ="service_order";



    public function cliente():BelongsTo
    {
        return $this->belongsTo(Cliente::class,'cliente_id');
    }
}