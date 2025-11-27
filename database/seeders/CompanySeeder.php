<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
            [
                'parent_id' => null,
                'name' => 'МАКТАЛЫ AGRO',
            ],
            [
                'parent_id' => null,
                'name' => 'KAVS',
            ],
            [
                'parent_id' => null,
                'name' => 'AGRO SAD',
            ],
            [
                'parent_id' => null,
                'name' => 'MAKTALY ZHER',
            ],
            [
                'parent_id' => null,
                'name' => 'ИП PRO SERJEO',
            ],
            [
                'parent_id' => 2,
                'name' => 'KAVS Кызылорда',
            ],
            [
                'parent_id' => 2,
                'name' => 'KAVS Шымкент',
            ],
            [
                'parent_id' => 2,
                'name' => 'KAVS Сарагаш',
            ],
            [
                'parent_id' => 2,
                'name' => 'KAVS Киров',
            ],
            [
                'parent_id' => 2,
                'name' => 'KAVS Макталы',
            ],
        ]);
    }
}
