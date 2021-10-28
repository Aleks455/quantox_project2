<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Client;


class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'client_id' => Client::factory(),
            'service_name' => $this->faker->name(),
            'price' => $this->faker->name(),
            'quantity' => $this->faker->name(),
            'total_price' => $this->faker->name()
        ];
    }
}
