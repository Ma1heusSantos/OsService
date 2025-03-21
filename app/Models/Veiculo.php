<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Veiculo extends Model
{
    use HasFactory ,SoftDeletes;

    protected $fillable = [
        'marca',
        'modelo',
        'ano_modelo',
        'placa',
        'chassi',
        'cor',
        'tipo',
        'cliente_id',
        'imagem',
    ];
    protected $table ="veiculos";


    public function cliente():BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function getImagemAttribute($value)
    {
        return $value ? Storage::url($value) : null; 
    }
}