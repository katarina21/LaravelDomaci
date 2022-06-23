<?php

namespace Database\Factories;

use App\Models\Owner;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dog>
 */
class DogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->word(),
            'color'=>$this->faker->word(),
            'age'=>$this->faker->numberBetween(1,18),
            'owner_id'=>Owner::factory(),
            'breed_id'=>$this->faker->numberBetween(1,4),
            'user_id'=>User::factory()
        ];
    }
}
