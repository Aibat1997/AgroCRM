<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RealEstateTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('real_estate_types')->insert([
            [
                'title_ru' => 'Квартира',
                'title_kk' => 'Квартира',
            ],
            [
                'title_ru' => 'Магазин',
                'title_kk' => 'Магазин',
            ],
            [
                'title_ru' => 'Земельный участок',
                'title_kk' => 'Земельный участок',
            ],
        ]);
    }
}
