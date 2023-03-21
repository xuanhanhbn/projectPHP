<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Product;

class Likeproduct extends Model
{
    use HasFactory;
    protected $table = "likeproducts";

    protected $fillable = [
        'user_id',
        'product_id'
    ];

    public function getAllLiked()
    {

    }
    public function Product()
    {
        return $this->hasOne(Product::class, "id", "product_id");
    }

}