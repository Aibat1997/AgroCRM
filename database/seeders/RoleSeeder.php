<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_roles')->insert([
            [
                'title_ru' => 'Владелец',
                'code_type' => 'owner',
            ],
            [
                'title_ru' => 'Администратор',
                'code_type' => 'admin',
            ],
            [
                'title_ru' => 'Лаборант',
                'code_type' => 'laboratorian',
            ],
            [
                'title_ru' => 'Весовщик',
                'code_type' => 'weigher',
            ],
            [
                'title_ru' => 'Экономист',
                'code_type' => 'economist',
            ],
            [
                'title_ru' => 'Бухгалтер',
                'code_type' => 'accountant',
            ],
            [
                'title_ru' => 'Менеджер',
                'code_type' => 'manager',
            ],
        ]);
    }
}
