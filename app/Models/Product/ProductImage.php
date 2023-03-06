<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = "productImages";

    protected $fillable = [
        "path"
    ];

    public function Product(){
        return $this -> belongsTo(Product::class);
    }
}
