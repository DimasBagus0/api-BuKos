<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class OwnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run()
        {
            User::create([
                'name' => 'Dimas',
                'email' => 'dimas@gmail.com',
                'phone' => '08954212819',
                'password' => bcrypt('bangudahbang'),
                'role' => 'owner',
            ]);

            User::create([
                'name' => 'Antariksa',
                'email' => 'antariksa@gmail.com',
                'phone' => '08121293911',
                'password' => bcrypt('bangudahbang'),
                'role' => 'owner',
            ]);
        }
}
