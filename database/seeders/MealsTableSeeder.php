<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $meals = [
            ['name' => '朝ごはん'],
            ['name' => '昼ごはん'],
            ['name' => '夜ごはん'],
        ];
        foreach ($meals as $m) {
            DB::table('meals')->insert($m);
        }
    }
}
