<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubOrder extends Model
{
    use HasFactory;

    protected $table = "subOrders";
    protected $fillable = [
        "quantity",
        "sub_total",
        "status"
    ];

    public function Order(){
        return $this -> belongsTo(Order::class);
    }

    public function Product(){
        return $this -> hasOne(Product::class);
    }
}
