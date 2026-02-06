<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        ]);
    }
}
