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
            'users_id' => 1,
            'category_id' => $this->faker->randomElement([1,2,3]),
            'product_name' => $this->faker->unique()->word(),
            'harga' => 2500,
            'desc' => $this->faker->unique()->sentence(3),
            'image' => $this->faker->randomElement(['product-images/eHtfnb27HIOxVYUSaQGfTAO9K8ZwQVYd1C6SA60Z.jpg','product-images/4tcLpWIevn3EsYu0rcyCGgqMQyPnL4VQle6DjzSo.jpg,product-images/gKpwt3w6CBiVCKrjnlezDN2eQ1UeyJpQDAq8H68E.jpg,product-images/eHtfnb27HIOxVYUSaQGfTAO9K8ZwQVYd1C6SA60Z.jpg']),
            'stok' => 20
        ];
    }

    public function withID($id)
    {
        return $this->state([
            'users_id' => $id,
        ]);
    }
}
