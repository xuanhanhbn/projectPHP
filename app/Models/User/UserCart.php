<?php

namespace App\Models\User;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCart extends Model
{
    use HasFactory;
    protected $table = "userCarts";
    protected $fillable = [
        "quantity",
        "user_id",
        "product_id"
    ];
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Product(){
        return $this->hasOne(Product::class,"id");
    }

}
