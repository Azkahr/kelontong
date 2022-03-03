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
            'image' => 'product-images/be0sAJqYTi1ToxVDkOIPiwIWLGkZlZ5JbkKRHWMH.jpg,product-images/EFlRPZ2WMz3iSUqbnfKoVZHOKtsRP7go1rLsIMNL.jpg,product-images/ERO0DpjBcDam2plSlQ9zW191ZfoWiiEtprVxTVxz.jpg,product-images/lmAIKCpmPCU4wf9XFYFlM6Znt8EyzlxEFAqPPAWB.jpg,product-images/roqdJZq4sT25NTejHDyzn0gYUSUI9oPa2hduRock.jpg',
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
