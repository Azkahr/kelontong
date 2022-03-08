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
            'category_id' => $this->faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12]),
            'product_name' => $this->faker->unique()->word(),
            'harga' => 2500,
            'desc' => $this->faker->unique()->sentence(3),
            'image' => 'product-images/5H1b4hn2y7vQqPgACOkcp6m3H2ebNcYhXLcCGlVQ.jpg,product-images/3VpSVbkHQyguN0tBVOPhn5BIjaLV74A6qoIDGTlN.jpg,product-images/1ANBxvE1ovX2lJgpdHejGBqStSSqO5NdW1Jmko8Z.png,product-images/wDFGyRTwGZfmT3dYAcKpF6kwR22qomRRg8ckFbeT.jpg,product-images/wDFGyRTwGZfmT3dYAcKpF6kwR22qomRRg8ckFbeT.jpg',
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
