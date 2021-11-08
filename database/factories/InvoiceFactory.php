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
         
        return [
            // 'user_id' => $user_id,
            // 'client_id' => $client_id
            // 'grand_total' => $grand_total
        ];
    }
}
