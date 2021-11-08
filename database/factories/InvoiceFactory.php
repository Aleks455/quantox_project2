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
        $users = User::pluck('id');
        $user_id = $users[0];


        $clients = Client::pluck('id');
        $client_id = $clients[0];    

        // $items_total = Item::get()->pluck('total');
        // $grand_total = 0;
        // foreach($items_total as $item_total){
        //     $grand_total += $item_total;
        // }

        return [
            'user_id' => $user_id,
            'client_id' => $client_id
            // 'grand_total' => $grand_total
        ];
    }
}
