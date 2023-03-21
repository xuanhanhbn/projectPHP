<?php

namespace Database\Seeders;

use App\Models\User\Role;
use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $admin = User::create([
        //     'phone' => "0123456789",
        //     'email' => "admin@localhost",
        //     'password' => Hash::make("admin"),
        //     'firstname' => "Admin",
        //     'lastname' => "System"
        // ]);
        // Role::create([
        //     "user_id"=>$admin->id,
        //     "role"=>"ADMIN"
        // ]);

        // \App\Models\Category\Category::factory(10)->create();
        //\App\Models\Product\Product::factory(50)->create();
    }
}
