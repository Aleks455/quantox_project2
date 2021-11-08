<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   $invoices = Invoice::pluck('id');
        $invoice_id = $invoices[0];

        $price = $this->faker->numberBetween(500,1000);
        $quantity = $this->faker->numberBetween(1,5);
        $total = $price * $quantity;

        return [
            'invoice_no' => $invoice_id, 
            'name' => $this->faker->randomElement(['Web Designe','Database update','Plug-in update']),
            'price' => $price,
            'quantity' => $quantity,
            'total' => $total
        ];
    }
}
