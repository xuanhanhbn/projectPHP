<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likeproduct extends Model
{
    use HasFactory;
    protected $table = "likeproducts";

    protected $fillable = [
        'user_id',
        'product_id'
    ];

    public function getAllLiked() {
        
    }

}
