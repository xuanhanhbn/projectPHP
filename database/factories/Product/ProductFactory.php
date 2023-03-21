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
            "title"=>$this->faker->sentence($nbWords = 3, $variableNbWords = true),
            "price"=>$this->faker->numberBetween($min = 100, $max = 900)*1000,
            "in_stock"=>random_int(0,100),
            "sold"=>random_int(0,100),
            "thumbnail"=>$this->faker->imageUrl(),
            "category_id"=> random_int(1,3),
            "recipient_id"=> random_int(1,5),
            "rating" => random_int(1,5)

        ];
    }
}
