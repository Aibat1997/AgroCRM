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
                'name' => 'МАКТАЛЫ AGRO',
            ],
            [
                'name' => 'KAVS',
            ],
            [
                'name' => 'AGRO SAD',
            ],
            [
                'name' => 'MAKTALY ZHER',
            ],
            [
                'name' => 'ИП PRO SERJEO',
            ],
        ]);
    }
}
