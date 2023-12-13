<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Situacao extends Model
{
    use HasFactory;

    protected $table = 'situacoes';
    protected $fillable = ['nome'];

    public function patrimonios(){
        return $this->hasMany(Patrimonio::class);
    }
}
