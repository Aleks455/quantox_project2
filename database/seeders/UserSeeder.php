<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // $user = User::factory()->create([
        //     'id' => '1',
        //     'first_name' => 'Aleksandra',
        //     'last_name' => 'Petrovic',
        //     'email' => 'ap@ap.com',
        //     'password' => Hash::make('11111111')
        // ]);
        // $user->save();
    }
}
