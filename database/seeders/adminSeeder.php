<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'nom' => 'admin',
          'isAdmin' => 1,
          'email' => 'admin@gmail.com',
          'password' => Hash::make('azerty12345')
        ]);
    }
}
