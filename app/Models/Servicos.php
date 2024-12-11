<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servicos extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="servicos";
    protected $fillable=["codigo","descricao","valor","categoria_id"];


    public function ordensDeServico()
    {
        return $this->belongsToMany(ServiceOrder::class, 'service_order_servicos')
                    ->withPivot('quantidade', 'preco')
                    ->withTimestamps();
    }

    public function CategoriaServico(){
        return $this->belongsTo(CategoriaServico::class,'categoria_id');
    }

}