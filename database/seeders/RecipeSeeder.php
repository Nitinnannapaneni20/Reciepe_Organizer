<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('recipes')->insert([
            [
                'name' => 'Spaghetti',
                'ingredients' => 'Pasta, Tomato Sauce',
                'instructions' => 'Boil pasta, add sauce',
            ],
            [
                'name' => 'Salad',
                'ingredients' => 'Lettuce, Tomato, Dressing',
                'instructions' => 'Mix ingredients',
            ],
        ]);
    }
}