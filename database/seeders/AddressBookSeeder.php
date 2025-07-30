<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\AddressBook;

class AddressBookSeeder extends Seeder
{
    public function run()
    {
        $user = User::first() ?? User::factory()->create([
            'name' => 'Demo User',
            'email' => 'demo@example.com',
            'password' => bcrypt('password'),
        ]);

        AddressBook::factory()->count(3)->create([
            'user_id' => $user->id,
        ]);
    }
}

