<?php

namespace App\Models\Product;

use App\Models\Category\Category;
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
        "thumbnail",
        "category_id"
    ];

    public function ProductImages(){
        return $this -> hasMany(ProductImage::class);
    }
    public function ProductRatings(){
        return $this -> hasMany(ProductRating::class);
    }

    public function Category(){
        return $this -> belongsTo(Category::class);
    }
    
    public function scopeSearch($query,$search){
        if($search && $search != ""){
            return $query->where("title","like","%$search%")
                ->orWhere("description","like","%$search%");
        }
        return $query;
    }

    public function scopeCategoryFilter($query,$category_id){
        if($category_id && $category_id != 0){
            return $query->where("category_id",$category_id);
        }
        return $query;
    }
    public function productImage($id){
        return $this ->hasOne(ProductImage::class)->where("product_id",$id);
    }

}
