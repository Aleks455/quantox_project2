<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Sabberworm\CSS\Property\Import;


class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::get();

        // $clients = Client::factory(3)
        // ->hasInvoice (2,[
        //     'user_id' => $user->id,
        //     'user_name' => $user->first_name
        // ])
        // ->create([
        //     'user_id' => $this->user->id
        // ]);
        // $clients->save();
    }
}
