<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create(
            [
                'name' => 'Administrator',
                'email' => 'admin@lets.com.vc',
                'password' => '12345678',
                'is_admin'=> 'true',
                'remember_token' => Str::random(10)
            ]
        );
    }
}
