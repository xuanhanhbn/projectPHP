<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCart extends Model
{
    use HasFactory;
    protected $table = "userCarts";
    protected $fillable = [
        "quantity"
    ];
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Product(){
        return $this->hasMany(Product::class);
    }

}
