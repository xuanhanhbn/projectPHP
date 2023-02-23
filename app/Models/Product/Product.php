<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    protected $fillable = [
        "title",
        "description",
        "price",
        "in_stock",
        "sold",
        "rating",
        "comment",
        "thumbnail"
    ];

    public function ProductImages(){
        return $this -> hasMany(ProductImage::class);
    }

    public function Category(){
        return $this -> belongsTo(Category::class);
    }

    

}
