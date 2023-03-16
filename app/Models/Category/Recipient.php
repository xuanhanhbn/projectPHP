<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    use HasFactory;
    protected $table = "recipients";

    protected $fillable = [
        "title",
        "key",
        "description"
    ];

    public function Products(){
        return $this -> hasMany(Product::class);
    }
}
