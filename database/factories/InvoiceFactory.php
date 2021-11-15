<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Client;
use App\Models\Item;

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
         $date = $this->faker->dateTimeBetween('now', '+10 days');

        return [
            'date' => $date,
            'due_date' => $this->faker->dateTimeBetween($date,'+10 days'),
        ];
    }
}
