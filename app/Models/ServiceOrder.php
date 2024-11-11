<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $table ="service_order";
    protected $fillable = [
        'descricao',
        'preco',
        'status',
        'usuario_id',
        'categoria_id',
        'cliente_id',
    ];



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

    public function pecas():BelongsToMany
    {
        return $this->belongsToMany(Peca::class,'service_order_pecas')->withPivot('quantidade')->withTimestamps();;
    }
    public function servicos()
{
    return $this->belongsToMany(Servicos::class, 'service_order_servicos')
                ->withPivot('quantidade', 'preco')
                ->withTimestamps();
}

}