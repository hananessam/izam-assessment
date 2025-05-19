<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = ['id'];

    public function products()
    {
        return $this->hasMany(CartProduct::class);
    }
}
