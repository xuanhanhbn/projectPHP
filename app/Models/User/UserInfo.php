<?php

namespace App\Models\User;

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
