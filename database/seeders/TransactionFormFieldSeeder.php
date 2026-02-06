<?php

namespace Database\Seeders;

use App\Enums\TransactionTypeId;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionFormFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transaction_form_fields')->insert([
            [
                'transaction_type_id' => TransactionTypeId::PURCHASE->value,
                'field_label_ru' => 'Товар',
                'field_label_kk' => 'Товар',
                'field_tag' => 'select',
                'field_name' => 'warehouse_item_id',
                'field_type' => null,
                'field_values_url' => '/api/warehouse-items',
                'field_attributes' => null,
                'field_validation' => "required|integer|exists:warehouse_items,id",
                'is_required' => true,
                'sort_num' => 1,
            ],
            [
                'transaction_type_id' => TransactionTypeId::PURCHASE->value,
                'field_label_ru' => 'Количество',
                'field_label_kk' => 'Количество',
                'field_tag' => 'input',
                'field_name' => 'quantity',
                'field_type' => 'number',
                'field_values_url' => null,
                'field_attributes' => null,
                'field_validation' => "required|integer|min:1",
                'is_required' => true,
                'sort_num' => 2,
            ],
            [
                'transaction_type_id' => TransactionTypeId::PURCHASE->value,
                'field_label_ru' => 'Единица измерения',
                'field_label_kk' => 'Единица измерения',
                'field_tag' => 'select',
                'field_name' => 'unit_id',
                'field_type' => null,
                'field_values_url' => '/api/units',
                'field_attributes' => null,
                'field_validation' => "required|integer|exists:units,id",
                'is_required' => true,
                'sort_num' => 3,
            ],
        ]);
    }
}
