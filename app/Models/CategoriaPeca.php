<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Peca;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriaPeca extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "categoria_peca";

    protected $fillable =[
        'descricao',
    ];


    public function pecas():HasMany{
        return $this->hasMany(Peca::class);
    }
}