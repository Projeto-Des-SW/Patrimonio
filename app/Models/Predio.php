<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Predio extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function salas(){
        return $this->hasMany(Sala::class);
    }
}
