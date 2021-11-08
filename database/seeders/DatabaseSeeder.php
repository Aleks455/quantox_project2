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
        $client = Client::factory(3)->create([
            'user_id' => $user->id
        ]);
        $invoice = Invoice::factory(2)->create([
            'user_id' => $user->id,
            'client_id' => $client[0]->id
        ]);
        Item::factory(5)->create([
            'invoice_no' => $invoice[0]->id
        ]);
    }
}
