<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentFrequencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_frequencies')->insert([
            [
                'title_ru' => 'помесячно',
                'title_kk' => 'ай сайын',
            ],
            [
                'title_ru' => 'ежегодно',
                'title_kk' => 'жыл сайын',
            ],
            [
                'title_ru' => 'ежеквартально',
                'title_kk' => 'тоқсан сайын',
            ],
        ]);
    }
}
