<?php

namespace App\Models\Category;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $fillable = [
        "title",
        "key",
        "image",
        "description"
    ];

    public function Products(){
        return $this -> hasMany(Product::class);
    }
    public function FirstProduct(){
        return $this->hasOne(Product::class)->orderBy("price","desc");
    }
    public function ProductsLatest(){
        return $this->hasMany(Product::class)->limit(5)->orderBy('id','desc');
    }
}
