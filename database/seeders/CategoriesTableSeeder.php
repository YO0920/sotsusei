<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => '主食'],
            ['name' => 'メイン'],
            ['name' => 'サイド'],
            ['name' => 'デザート'],
        ];
        foreach ($categories as $c) {
            DB::table('categories')->insert($c);
        }
    }
}
