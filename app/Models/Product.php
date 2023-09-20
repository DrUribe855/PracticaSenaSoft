<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $table = "products";
    protected $fillable = [
        'product_id',
        'product_name',
        'price',
        'stock',
        'status',
    ];

    public function product(){
        return $this->hasMany(Order::class, "product_id");
    }
}
