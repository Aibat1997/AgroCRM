<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CompanySeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            UnitSeeder::class,
            CurrencySeeder::class,
            WarehouseSeeder::class,
            RealEstateTypeSeeder::class,
            PaymentFrequencySeeder::class,
            CottonPurchasePriceSeeder::class,
            TransactionTypeSeeder::class,
            TransactionFormFieldSeeder::class,
            PaymentMethodSeeder::class,
        ]);

        DB::unprepared(file_get_contents(database_path('seeders/sql-dumps/transaction_type_form_fields.sql')));
    }
}
