<?php

namespace Database\Seeders;

use App\Enums\UserRoleId;
use App\Enums\UserStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'role_id' => UserRoleId::ADMIN->value,
                'company_id' => null,
                'name' => 'Нурым',
                'phone' => '77082004001',
                'salary' => null,
                'password' => Hash::make('12345678'),
                'status' => UserStatus::CONFIRMED->value,
            ],
        ]);
    }
}
