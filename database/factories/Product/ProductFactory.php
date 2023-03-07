<?php

namespace Database\Factories\Product;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title"=>$this->faker->title,
            "price"=>random_int(1000,1000000),
            "in_stock"=>random_int(0,500),
            "sold"=>random_int(0,500),
            "thumbnail"=>$this->faker->imageUrl(),
            "category_id"=> random_int(1,10)
        ];
    }
}
