<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserJobOfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'job_offer_id' => rand(1,1000),
            'user_id' => rand(1, 1000),
        ];
    }
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'user_id' => null
            ];
        });
    }
}
