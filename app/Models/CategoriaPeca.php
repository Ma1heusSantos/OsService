<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Peca;

class CategoriaPeca extends Model
{
    use HasFactory;

    protected $table = "categoria_peca";


    public function pecas():HasMany{
        return $this->hasMany(Peca::class);
    }
}