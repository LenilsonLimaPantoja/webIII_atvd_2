<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Categoria;

class Veiculo extends Model
{
    use HasFactory;
    protected $table = 'veiculo';
    public $timestamps = false;
    
    public function categoria(): BelongsTo
    {
       return $this->belongsTo(Categoria::class);
    }
}
