<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        User::query()->create([
            'name'=>'Luka',
            'email'=>'luka@mail.com',
            'password'=> Hash::make('12345678'),
            'position_id' => 1]);
    }
}
