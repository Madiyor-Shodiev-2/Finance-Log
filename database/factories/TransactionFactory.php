<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {

        return [
            'amount' => $this->faker->randomFloat(2, 1, 10),
            'date' => $this->faker->date(),
            'type' => $this->faker->boolean(),
            'description' => $this->faker->sentence(),
            'user_id' => 1
        ];
    }
}
