<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
    use HasFactory;

    protected $table = "productRatings";

    protected $fillable = [
        "rate",
        "comment",
        "product_id",
    ];

    public function Product(){
        return $this -> belongsTo(Product::class);
    }
}
