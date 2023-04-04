<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classificacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'residual',
        'vida_util'
    ];

    public function patrimonios (){
        return $this->hasMany(Patrimonio::class);
    }
}
