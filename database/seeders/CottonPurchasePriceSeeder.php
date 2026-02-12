<?php

namespace Database\Seeders;

use App\Enums\CottonPurchasePriceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CottonPurchasePriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cotton_purchase_prices')->insert([
            [
                'user_id' => 1,
                'price' => 280,
                'purchase_type' => CottonPurchasePriceType::COTTON_PRICE->value,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'price' => 140,
                'purchase_type' => CottonPurchasePriceType::PREPAYMENT_PRICE->value,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
