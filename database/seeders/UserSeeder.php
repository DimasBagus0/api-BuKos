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
        // $users = [
        //     [
        //         'name' => 'Dimas',
        //         'email' => 'dimas@gmail.com',
        //         'password' => 'DimasB@gus1',
        //     ],
        //     [
        //         'name' => 'Antariksa',
        //         'email' => 'antariksa@gmail.com',
        //         'password' => 'Antariks@3',
        //     ],
        //     // Tambahkan pengguna lain sesuai kebutuhan Anda
        // ];

        // foreach ($users as $userData) {
        //     $userData['password'] = Hash::make($userData['password']);
        //     User::create($userData);
        // }
    }
}
