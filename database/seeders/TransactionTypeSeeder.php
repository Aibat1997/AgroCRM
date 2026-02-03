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
                'title_ru' => 'Выплата кредита/займа',
            ],
            [
                'title_ru' => 'Получение кредита/займа',
            ],
            [
                'title_ru' => 'Оплата платежей и услуг',
            ],
            [
                'title_ru' => 'Перевод между компаниями',
            ],
        ]);
    }
}
