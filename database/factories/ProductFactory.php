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
            'image' => $this->faker->randomElement(['product-images/Je69nWbxHuEOSrzd7ImXW3qGqyPUDJ5oNYJJau7A.jpg,product-images/5YcGDV0LwIFFMqJN8IQuLeWgPGfLtyvWBmxajHn2.jpg','product-images/5tbwtoI2yjU4iLzGMhOolLRGCHLrl8PF08ibwVM5.jpg,product-images/MeGZQ8WA1gvLLmd9HRsKJ3tqcutOsns64JBrgenP.jpg,product-images/ezrDHSqJDgZ11o6laMBlHPz424uwQSCk6FOmuRyV.jpg,product-images/hUlnSUB6uRdx3D9nNWdzjoSkTSgtUHxotJDaXPl5.jpg']),
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
