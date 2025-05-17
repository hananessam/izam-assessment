<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\Status;

class Product extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'price' => 'decimal:2',
        'status' => Status::class,
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', Status::ACTIVE);
    }

    public function scopeInactive($query)
    {
        return $query->where('status', Status::INACTIVE);
    }

    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);
    }

    public function scopeOutOfStock($query)
    {
        return $query->where('stock', 0);
    }
}
