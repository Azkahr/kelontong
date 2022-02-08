<?php

namespace Database\Factories;

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
            'users_id' => 2,
            'category_id' => $this->faker->randomElement([1,2]),
            'users_id' => 1,
            'product_name' => $this->faker->unique()->word(),
            'desc' => $this->faker->unique()->sentence(3),
            'qty' => 20
        ];
    }

    public function withID($id)
    {
        return $this->state([
            'users_id' => $id,
        ]);
    }
}
