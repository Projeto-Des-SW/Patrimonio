<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'telefone', 'predio_id'];

    public function predio()
    {
        return $this->belongsTo(Predio::class);
    }

    public function patrimonios()
    {
        return $this->hasMany(Patrimonio::class);
    }
}
