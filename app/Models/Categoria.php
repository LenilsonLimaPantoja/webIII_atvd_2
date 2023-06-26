<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Veiculo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categoria';
    public $timestamps = false;

    public function veiculos(): HasMany
    {
        return $this->hasMany(Veiculo::class)->orderByRaw('ano desc')->take(3);
    }

}
