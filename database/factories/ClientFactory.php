<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            // 'user_id'=>
            'company_number' => $this->faker->randomNumber(),
            'vat_id' => $this->faker->randomNumber(),
            'bank_account' => $this->faker->randomNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone_number'=> $this->faker->randomNumber(),
            'address'=> $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'postal_code'=> $this->faker->numberBetween(10000,99999),
            'country'=> $this->faker->country(),

        ];
    }
}
