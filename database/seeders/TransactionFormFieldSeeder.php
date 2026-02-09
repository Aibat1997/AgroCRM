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
                'field_label_ru' => 'Название товара',
                'field_label_kk' => 'Тауардың атауы',
                'field_tag' => 'input',
                'field_name' => 'warehouse_item_title',
                'field_type' => 'text',
                'field_values_url' => null,
                'field_attributes' => json_encode([
                    'placeholder' => 'Введите название товара',
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
                'field_validation' => "required|string",
                'is_required' => true,
                'sort_num' => 1,
            ],
            [
                'transaction_type_id' => TransactionTypeId::PURCHASE->value,
                'field_label_ru' => 'Артикул товара',
                'field_label_kk' => 'Тауардың артикуласы',
                'field_tag' => 'input',
                'field_name' => 'warehouse_item_article_number',
                'field_type' => 'text',
                'field_values_url' => null,
                'field_attributes' => json_encode([
                    'placeholder' => 'Введите артикул товара',
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
                'field_validation' => "nullable|string",
                'is_required' => false,
                'sort_num' => 2,
            ],
            [
                'transaction_type_id' => TransactionTypeId::PURCHASE->value,
                'field_label_ru' => 'Количество',
                'field_label_kk' => 'Саны',
                'field_tag' => 'input',
                'field_name' => 'quantity',
                'field_type' => 'number',
                'field_values_url' => null,
                'field_attributes' => json_encode([
                    'placeholder' => 'Введите количество',
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
                'field_validation' => "required|integer|min:1",
                'is_required' => true,
                'sort_num' => 3,
            ],
            [
                'transaction_type_id' => TransactionTypeId::PURCHASE->value,
                'field_label_ru' => 'Единица измерения',
                'field_label_kk' => 'Өлшем бірлігі',
                'field_tag' => 'select',
                'field_name' => 'unit_id',
                'field_type' => null,
                'field_values_url' => '/api/units',
                'field_attributes' => json_encode([
                    'placeholder' => 'Выберите единицу измерения',
                    'multiple' => false,
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
                'field_validation' => "required|integer|exists:units,id",
                'is_required' => true,
                'sort_num' => 4,
            ],
            [
                'transaction_type_id' => TransactionTypeId::PURCHASE->value,
                'field_label_ru' => 'Валюта',
                'field_label_kk' => 'Валюта',
                'field_tag' => 'select',
                'field_name' => 'currency_id',
                'field_type' => null,
                'field_values_url' => '/api/currencies',
                'field_attributes' => json_encode([
                    'placeholder' => 'Выберите валюту',
                    'multiple' => false,
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
                'field_validation' => "required|integer|exists:currencies,id",
                'is_required' => true,
                'sort_num' => 5,
            ],
            [
                'transaction_type_id' => TransactionTypeId::PURCHASE->value,
                'field_label_ru' => 'Цена за единицу',
                'field_label_kk' => 'Бірлік бағасы',
                'field_tag' => 'input',
                'field_name' => 'original_unit_price',
                'field_type' => 'number',
                'field_values_url' => null,
                'field_attributes' => json_encode([
                    'placeholder' => 'Введите цену за единицу',
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
                'field_validation' => "required|integer|min:1",
                'is_required' => true,
                'sort_num' => 6,
            ],
            [
                'transaction_type_id' => TransactionTypeId::PURCHASE->value,
                'field_label_ru' => 'Поставщик',
                'field_label_kk' => 'Жеткізуші',
                'field_tag' => 'input',
                'field_name' => 'supplier',
                'field_type' => 'text',
                'field_values_url' => null,
                'field_attributes' => json_encode([
                    'placeholder' => 'Введите поставщика',
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
                'field_validation' => "nullable|string",
                'is_required' => true,
                'sort_num' => 7,
            ],
        ]);
    }
}
