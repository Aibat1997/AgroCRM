<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transaction_types')->insert([
            [
                'title_ru' => 'Покупка',
            ],
            [
                'title_ru' => 'Продажа',
            ],
            [
                'title_ru' => 'Предоставление займа',
            ],
            [
                'title_ru' => 'Поступление средств от заемщика',
            ],
            [
                'title_ru' => 'Получение кредита',
            ],
            [
                'title_ru' => 'Оплата кредита',
            ],
            [
                'title_ru' => 'Оплата платежей и услуг',
            ],
            [
                'title_ru' => 'Оказание услуги',
            ],
            [
                'title_ru' => 'Оказание финансовой помощи',
            ],
            [
                'title_ru' => 'Получение финансовой помощи',
            ],
            [
                'title_ru' => 'Налоговые платежи',
            ],
            [
                'title_ru' => 'Оплата за сырье',
            ],
        ]);
    }
}
