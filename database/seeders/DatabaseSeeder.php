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


        // $this->call([
        //     UserSeeder::class,
        //     ClientSeeder::class,
        //     ItemSeeder::class
        // ]);


        $user = User::factory()->create([
            'id' => '1',
            'first_name' => 'Aleksandra',
            'last_name' => 'Petrovic',
            'email' => 'ap@ap.com',
            'password' => Hash::make('11111111')
        ]);
  
        Client::factory(3)
        ->hasInvoice (2,[
            'user_id' => $user->id,
            'user_name' => $user->first_name
        ])
        ->create([
            'user_id' => $user->id
        ]);

        Item::factory()->create([
            'user_id' => $user->id,
            'name' => 'Web Designe'
        ]);
            

    }
}
