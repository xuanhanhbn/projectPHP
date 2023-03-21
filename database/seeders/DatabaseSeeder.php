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
        // $admin = User::create([
        //     'phone' => "0123456789",
        //     'email' => "admin@localhost",
        //     'password' => Hash::make("admin"),
        //     'firstname' => "Admin",
        //     'lastname' => "System"
        // ]);
        // $user = User::create([
        //     'phone' => "0987654321",
        //     'email' => "user@localhost",
        //     'password' => Hash::make("user"),
        //     'firstname' => "User",
        //     'lastname' => "Local"
        // ]);
        // Role::create([
        //     "user_id"=>$admin->id,
        //     "role"=>"ADMIN"
        // ]);
        // Role::create([
        //     "user_id"=>$user->id,
        //     "role"=>"USER"
        // ]);
        // $categories = [
        //     [
        //         'title' => 'Chocolate Gifts',
        //         'key' => 'chocolate',
        //         'image' => '',
        //         'description' => ''
        //     ],
        //     [
        //         'title' => 'Flowers Gifts',
        //         'key' => 'flower',
        //         'image' => '',
        //         'description' => ''
        //     ],
        //     [
        //         'title' => 'Candle Gift Sets',
        //         'key' => 'candle',
        //         'image' => '',
        //         'description' => ''
        //     ],
        // ];
        // collect($categories)->each(function ($category) {
        //     \App\Models\Category\Category::create($category); });

        // $recipients = [
        //     [
        //         'title' => 'Gifts For Men',
        //         'key' => 'men',
        //         'description' => ''
        //     ],
        //     [
        //         'title' => 'Gifts For Women',
        //         'key' => 'women',
        //         'description' => ''
        //     ],
        //     [
        //         'title' => 'Gifts For Kids',
        //         'key' => 'kid',
        //         'description' => ''
        //     ],
        //     [
        //         'title' => 'Gifts For Colleagues',
        //         'key' => 'colleague',
        //         'description' => ''
        //     ],
        //     [
        //         'title' => 'Gifts For Family',
        //         'key' => 'family',
        //         'description' => ''
        //     ]
        // ];
        // collect($recipients)->each(function ($recipient) {
        //     \App\Models\Category\Recipient::create($recipient); });

        \App\Models\Product\Product::factory(50)->create();
    }
}
