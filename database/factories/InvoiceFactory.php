<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Client;
use App\Models\ServiceItem;

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
        $price = $this->faker->numberBetween(100,1000);
        $quantity = $this->faker->numberBetween(1,5);
        return [
            'user_id' => User::factory(),
            'user_name' => $this->faker->name(),
            'client_id' => Client::factory(),
            // 'services_id' => ServiceItem::factory(),
            'service_name' => $this->faker->name(),
            'price' => $price,
            'quantity' => $quantity,
            'grand_total' => $price * $quantity,
            'grand_total' => $this->faker->numberBetween(1000,2000)

        ];
    }
}
