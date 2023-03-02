<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";

    protected $fillable = [
        "order_status",
        "total",
        "payment_type",
        "payment_status",
        "shipping_address",
        "receiver_contact"
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function SubOrder(){
        return $this->hasMany(SubOrder::class);
    }

}
