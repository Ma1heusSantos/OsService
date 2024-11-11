<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicos extends Model
{
    use HasFactory;

    protected $table="servicos";
    protected $fillable=["codigo","descricao","valor"];


    public function ordensDeServico()
    {
        return $this->belongsToMany(ServiceOrder::class, 'service_order_servicos')
                    ->withPivot('quantidade', 'preco')
                    ->withTimestamps();
    }

}