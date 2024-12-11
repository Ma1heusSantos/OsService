<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\CategoriaPeca;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peca extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="peca";

    protected $fillable =[
        'cod_peca',
        'nome',
        'preco',
        'quantidade',
        'categoria_id',
        'empresa_id'
    ];

    public function categoriaPeca():BelongsTo{
        return $this->belongsTo(CategoriaPeca::class, 'categoria_id');
    }
    public function serviceOrders()
    {
        return $this->belongsToMany(ServiceOrder::class,'service_order_pecas')->withPivot('quantidade')->withTimestamps();;
    }
}