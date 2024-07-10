<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        Position::query()->create([
            'name' => 'Backend',
            'department_id' => Department::query()->first()->id,
        ]);
    }
}
