<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $table = "userInfos";
    protected $fillable = [
        "fullName",
        "address",
        "age"
    ];
    public function User(){
        return $this->belongsTo(User::class);
    }
}
