<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('warehouses')->insert([
            [
                'company_id' => 1,
                'title' => 'Склад #1',
            ],
            [
                'company_id' => 3,
                'title' => 'Склад #1',
            ],
            [
                'company_id' => 4,
                'title' => 'Склад #1',
            ],
            [
                'company_id' => 5,
                'title' => 'Склад #1',
            ],
            [
                'company_id' => 6,
                'title' => 'Склад #1',
            ],
            [
                'company_id' => 7,
                'title' => 'Склад #1',
            ],
            [
                'company_id' => 8,
                'title' => 'Склад #1',
            ],
            [
                'company_id' => 9,
                'title' => 'Склад #1',
            ],
            [
                'company_id' => 10,
                'title' => 'Склад #1',
            ],
        ]);
    }
}
