<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = "productImages";

    protected $fillable = [
        "path",
        "product_id",
    ];

    public function Product(){
        return $this -> belongsTo(Product::class);
    }
}
