<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStore extends Model
{
    use HasFactory;

    public $table = "user_stores";
    protected $fillable = [
        'user_id',
        'store_id',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function store(){
        return $this->belongsTo(Store::class, "store_id");
    }
}
