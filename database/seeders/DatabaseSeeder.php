<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
use App\Models\Invoice;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $users = User::factory(3)->create();

        foreach($users as $user){
            
            Client::factory(3)
            ->hasInvoice (2,[
                'user_id' => $user->id
            ])
            ->create([
                'user_id' => $user->id
            ]);
        }
            
    }
}
