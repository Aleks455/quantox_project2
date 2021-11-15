<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

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
            // 'user_id'=> $user_id,
            'name' => $this->faker->company(),
            'company_number' => $this->faker->ean8(),
            'vat_id' => $this->faker->ean8(),
            'bank_account' => $this->faker->numberBetween (100000000000000000, 900000000000000000),
            'email' => $this->faker->unique()->safeEmail(),
            'phone_number'=> $this->faker->e164PhoneNumber(),
            'address'=> $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'postal_code'=> $this->faker->postcode(),
            'country'=> $this->faker->country(),
        ];
    }
}
