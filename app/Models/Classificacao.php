<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classificacao extends Model
{
    use HasFactory;

    protected $table = 'classificacoes';
    protected $fillable = [
        'nome',
        'codigo',
        'residual',
        'vida_util'
    ];

    public function subgrupos()
    {
        return $this->hasMany(Subgrupo::class);
    }
}
