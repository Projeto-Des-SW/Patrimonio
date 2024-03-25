<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMovimento extends Model
{
    use HasFactory;

    protected $table = 'tipos_movimento';
    protected $fillable = ['nome'];

    public function movimentos(){
        return $this->hasMany(Movimento::class);
    }
}
