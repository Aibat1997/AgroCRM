<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
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
        ];

        foreach ($companies as $data) {
            Company::create($data);
        }
    }
}
