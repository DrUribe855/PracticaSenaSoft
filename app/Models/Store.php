<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    public $table = "stores";
    protected $fillable = array("*");

    public function orders(){
        return $this->belongsToMany(Order::class, "orders");
    }
}
