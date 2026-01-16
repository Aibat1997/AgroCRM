<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('currencies')->insert([
            [
                'title_ru' => 'KZT',
                'title_kk' => 'KZT',
                'in_local_currency' => 1,
                'symbol' => '₸',
                'sort_num' => 1
            ],
            [
                'title_ru' => 'RUB',
                'title_kk' => 'RUB',
                'in_local_currency' => 6.55,
                'symbol' => '₽',
                'sort_num' => 2
            ],
            [
                'title_ru' => 'USD',
                'title_kk' => 'USD',
                'in_local_currency' => 514.5,
                'symbol' => '$',
                'sort_num' => 3
            ],
            [
                'title_ru' => 'EUR',
                'title_kk' => 'EUR',
                'in_local_currency' => 597.5,
                'symbol' => '€',
                'sort_num' => 4
            ],
            [
                'title_ru' => 'CNY',
                'title_kk' => 'CNY',
                'in_local_currency' => 77.1,
                'symbol' => '¥',
                'sort_num' => 5
            ],
            [
                'title_ru' => 'KGS',
                'title_kk' => 'KGS',
                'in_local_currency' => 6.03,
                'symbol' => '⃀',
                'sort_num' => 6
            ],
        ]);
    }
}
