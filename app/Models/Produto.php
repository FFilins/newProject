<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

// https://laravel.com/docs/10.x/eloquent-relationships
    public function categoria()
    {
        return $this->hasOne(Categoria::class , 'id', 'categoria_id');
    }
}
