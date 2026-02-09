<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_methods')->insert([
            [
                'title_ru' => 'Наличными',
            ],
            [
                'title_ru' => 'Банковской картой',
            ],
            [
                'title_ru' => 'Переводом',
            ],
            [
                'title_ru' => 'В долг',
            ],
        ]);
    }
}
