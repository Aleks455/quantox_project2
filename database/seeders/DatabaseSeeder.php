<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { 
        $user = User::factory()->create();

        $clients = Client::factory(10)->create([
            'user_id' => $user->id
        ]);

        foreach($clients as $client) {

            for($i = 0; $i < 3; $i++) {
                $invoices = Invoice::factory()->create([
                    'user_id' => $user->id,
                    'client_id' => $client->id
                ]);
                
                $items = Item::factory(5)->create([
                    'invoice_no' => $invoices->id
                ]);
                
                $grand_total = $items->sum('total');

                $invoices->grand_total = $grand_total;
                $invoices->save();
            }
           
        }
       
       
    }
}
