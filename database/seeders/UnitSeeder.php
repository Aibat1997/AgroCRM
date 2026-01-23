<?php

namespace Database\Seeders;

use App\Enums\UnitType;
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
                'type' => UnitType::COUNT,
            ],
            [
                'title_ru' => 'коробка',
                'title_kk' => 'коробка',
                'type' => UnitType::COUNT,
            ],
            [
                'title_ru' => 'упаковка',
                'title_kk' => 'упаковка',
                'type' => UnitType::COUNT,
            ],
            [
                'title_ru' => 'т',
                'title_kk' => 'т',
                'type' => UnitType::WEIGHT,
            ],
            [
                'title_ru' => 'кг',
                'title_kk' => 'кг',
                'type' => UnitType::WEIGHT,
            ],
            [
                'title_ru' => 'г',
                'title_kk' => 'г',
                'type' => UnitType::WEIGHT,
            ],
            [
                'title_ru' => 'л',
                'title_kk' => 'л',
                'type' => UnitType::VOLUME,
            ],
            [
                'title_ru' => 'м3',
                'title_kk' => 'м3',
                'type' => UnitType::VOLUME,
            ],
            [
                'title_ru' => 'га',
                'title_kk' => 'га',
                'type' => UnitType::AREA,
            ],
            [
                'title_ru' => 'м2',
                'title_kk' => 'м2',
                'type' => UnitType::AREA,
            ],
            [
                'title_ru' => 'сот',
                'title_kk' => 'сот',
                'type' => UnitType::AREA,
            ],
        ]);
    }
}
