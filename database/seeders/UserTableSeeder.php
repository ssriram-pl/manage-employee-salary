<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => Hash::make('Password@123'),
                'remember_token' => null,
                'created_at'     => '2019-09-19 12:08:28',
                'updated_at'     => '2019-09-19 12:08:28',
            ],
        ];

        User::insert($users);
    }
}
