<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
	protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
		$arrayValues = ['avalible',  'not avalible'];
        return [
            'category_id' =>$this->faker->numberBetween(1,6),
			'seller_id' => $this->faker->numberBetween(1,10),
			'name' => $this->faker->name(),
            'price' => $this->faker->randomNumber(),
            'stock' => $this->faker->numberBetween(1,10),
			'status' =>$arrayValues[rand(0,1)],
			'description' => $this->faker->text()

        ];
    }
}
