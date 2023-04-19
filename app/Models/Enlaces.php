<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enlaces extends Model
{
    use HasFactory;

    public function getUserCreate()
    {
        return $this->hasOne(User::class, 'id', 'users_create_id');
    }

    public function getTipo()
    {
        return $this->hasOne(TipoFondoPantalla::class, 'id', 'tipo_fondo_pantallas_id');
    }
}
