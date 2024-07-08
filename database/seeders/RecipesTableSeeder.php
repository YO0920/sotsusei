<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RecipesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = DB::table('categories')->pluck('id')->toArray();
        $meals = DB::table('meals')->pluck('id')->toArray();
        $users = DB::table('users')->pluck('id')->toArray();

        for ($i = 0; $i < 20; $i++) {
            DB::table('recipes')->insert([
                'id' => Str::uuid(),
                'user_id' => $users[array_rand($users)],
                'category_id' => $categories[array_rand($categories)],
                'meal_id' => $meals[array_rand($meals)],
                'title' => 'Recipe of ' . Str::random(10),
                'description' => 'このレシピはXXXです。' . Str::random(10),
                'point' => 'ポイントはXXXをYYYすることです！' . Str::random(10),
                'image' => 'https://picsum.photos/200',
                'carbo' => rand(0, 50),
                'lipid' => rand(0, 15),
                'protein' => rand(0, 50),
                'dietary_fiber' => rand(0, 50),
                'staple_contain' => rand(0, 1),
                'views' => rand(0, 500),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}