<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\ServiceItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ServiceItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    //     $item_name = Item::factory()->get()->name;
    //     $quantity = $this->faker->randomNumber(1,3);
    //     $item_price = Item::factory()->get()->price;
        return [
            'item_id' => Item::factory(),
            // 'item_name' => $item_name,
            // 'quantity' => $quantity,
            // 'item_price' => $item_price,
            // 'total' => $quantity * $item_price
        ];
    }
}
