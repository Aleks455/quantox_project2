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
        User::factory(2)
        ->has(Client::factory(2))
        ->create();
    }
}
