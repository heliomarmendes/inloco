<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Heliomar',
            'email' => 'cunegundes92@gmail.com',
            'password' => bcrypt('HPmkand10!')
        ]);
    }
}
    