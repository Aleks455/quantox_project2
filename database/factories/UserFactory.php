<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => '1',
            'first_name' => 'Aleksandra',
            'last_name' => 'Petrovic',
            'email' => 'ap@ap.com',
            'password' => Hash::make('11111111'),
            'remember_token' => Str::random(10),

            'company_name' =>  $this->faker->company(),
            'company_number' => $this->faker->randomNumber(),
            'vat_id' => $this->faker->randomNumber(),
            'company_address'=> $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state'=> $this->faker->country(),
            'postal_code'=> $this->faker->postcode(),
            'phone_number'=> $this->faker->e164PhoneNumber(),
            'bank_account' => $this->faker->randomNumber(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
