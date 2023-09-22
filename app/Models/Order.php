<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $table = "orders";
    protected $fillable = [
        'id',
        'store_id',
        'total',
    ];

    public function order_product(){
        return $this->hasMany(OrderProduct::class, "order_id");
    }

    public function store(){
        return $this->belongsTo(Store::class, "store_id");
    }
}
