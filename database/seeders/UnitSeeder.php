<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('units')->insert([
            [
                'title_ru' => 'шт',
                'title_kk' => 'шт',
            ],
            [
                'title_ru' => 'т',
                'title_kk' => 'т',
            ],
            [
                'title_ru' => 'кг',
                'title_kk' => 'кг',
            ],
            [
                'title_ru' => 'л',
                'title_kk' => 'л',
            ],
        ]);
    }
}
