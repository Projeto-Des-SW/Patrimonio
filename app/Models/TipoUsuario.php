<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function users(){
        return $this->belongsToMany(User::class, 'user_roles', 'tipos_usuarios_id', 'user_id');
    }
}
