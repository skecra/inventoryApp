<?php

namespace Database\Seeders;

use App\Models\EquipmentCategory;
use Illuminate\Database\Seeder;

class EquipmentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        $categories = ['Laptop', 'Desktop', 'Mouse', 'Monitor', 'Keyboard', 'Desk', 'Chair', 'Headphones'];

        foreach ($categories as $category) {
            EquipmentCategory::create(['name' => $category]);
        }
    }
}
