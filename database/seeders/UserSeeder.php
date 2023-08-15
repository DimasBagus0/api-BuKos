<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
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
            User::create([
                'name' => 'dimaz',
                'email' => 'dimazbaguz@gmail.com',
                'phone' => '0895426174001',
                'password' => bcrypt('mangeak'),
                'role' => 'user',
            ]);

            User::create([
                'name' => 'Antariksa',
                'email' => 'andariksa@gmail.com',
                'phone' => '087820025878',
                'password' => bcrypt('andarikza'),
                'role' => 'user',
            ]);

            User::create([
                'name' => 'Rasyid',
                'email' => 'rasyid1@gmail.com',
                'phone' => '082893128931',
                'password' => bcrypt('rasyid'),
                'role' => 'user',
            ]);
        }

}
