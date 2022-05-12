<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JobOfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->text,
            'status' => rand(1,0),
        ];
    }
}
