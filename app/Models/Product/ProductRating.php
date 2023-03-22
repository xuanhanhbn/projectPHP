<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\User;

class ProductRating extends Model
{
    use HasFactory;

    protected $table = "productRatings";

    protected $fillable = [
        "rate",
        "comment",
        "product_id",
        "user_id"
    ];

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}