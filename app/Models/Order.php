<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $table = "orders";
    protected $fillable = array("*");

    public function orders(){
        return $this->belongsToMany(SalesLog::class, "sales_log");
    }
}
