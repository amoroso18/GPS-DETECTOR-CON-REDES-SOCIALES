<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnlacesGeoApp extends Model
{
    use HasFactory;

    public function getUserCreate()
    {
        return $this->hasOne(User::class, 'id', 'users_create_id');
    }
}
