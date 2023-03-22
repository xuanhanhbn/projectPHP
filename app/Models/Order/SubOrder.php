<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Product;

class SubOrder extends Model
{
    use HasFactory;

    protected $table = "subOrders";
    protected $fillable = [
        "quantity",
        "sub_total",
        "status",
        "order_id",
        "product_id"
    ];

    public function Order(){
        return $this -> belongsTo(Order::class);
    }

    public function Product(){
        return $this -> hasOne(Product::class,"id","product_id");
    }
}
