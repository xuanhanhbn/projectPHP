<?php

namespace App\Models\Home;

use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Home extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = [
        "total",
    ];

    public function totalAmout(){
    $totalAmout = DB::table('orders')->where('create_at',DB::raw('CURDATE()'))->sum('total');
    dd( $totalAmout);
    return $totalAmout;
    }

    
    public function Category(){
        return $this -> belongsTo(Category::class);
    }

 
}