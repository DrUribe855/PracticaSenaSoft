<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    public $table = "stores";
    protected $fillable = [
        'store_id',
        'store_name',
        'address',
        'status',
    ];

    public function store(){
        return $this->hasMany(Order::class, "store_id");
    }
}
