<?php

namespace Database\Seeders;

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
                'parent_id' => null,
                'field_title_ru' => 'Название товара',
                'field_title_kk' => 'Тауардың атауы',
                'field_tag' => 'input',
                'field_name' => 'warehouse_item_title',
                'field_type' => 'text',
                'field_values_url' => null,
                'field_attributes' => json_encode([
                    'placeholder' => 'Введите название товара',
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
                'field_validation' => "string",
            ],
            [
                'parent_id' => null,
                'field_title_ru' => 'Артикул товара',
                'field_title_kk' => 'Тауардың артикуласы',
                'field_tag' => 'input',
                'field_name' => 'warehouse_item_article_number',
                'field_type' => 'text',
                'field_values_url' => null,
                'field_attributes' => json_encode([
                    'placeholder' => 'Введите артикул товара',
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
                'field_validation' => "string",
            ],
            [
                'parent_id' => null,
                'field_title_ru' => 'Количество',
                'field_title_kk' => 'Саны',
                'field_tag' => 'input',
                'field_name' => 'quantity',
                'field_type' => 'number',
                'field_values_url' => null,
                'field_attributes' => json_encode([
                    'placeholder' => 'Введите количество',
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
                'field_validation' => "integer|min:1",
            ],
            [
                'parent_id' => null,
                'field_title_ru' => 'Единица измерения',
                'field_title_kk' => 'Өлшем бірлігі',
                'field_tag' => 'select',
                'field_name' => 'unit_id',
                'field_type' => null,
                'field_values_url' => '/api/units',
                'field_attributes' => json_encode([
                    'placeholder' => 'Выберите единицу измерения',
                    'multiple' => false,
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
                'field_validation' => "integer|exists:units,id",
            ],
            [
                'parent_id' => null,
                'field_title_ru' => 'Валюта',
                'field_title_kk' => 'Валюта',
                'field_tag' => 'select',
                'field_name' => 'currency_id',
                'field_type' => null,
                'field_values_url' => '/api/currencies',
                'field_attributes' => json_encode([
                    'placeholder' => 'Выберите валюту',
                    'multiple' => false,
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
                'field_validation' => "integer|exists:currencies,id",
            ],
            [
                'parent_id' => null,
                'field_title_ru' => 'Цена за единицу',
                'field_title_kk' => 'Бірлік бағасы',
                'field_tag' => 'input',
                'field_name' => 'original_unit_price',
                'field_type' => 'number',
                'field_values_url' => null,
                'field_attributes' => json_encode([
                    'placeholder' => 'Введите цену за единицу',
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
                'field_validation' => "integer|min:1",
            ],
            [
                'parent_id' => null,
                'field_title_ru' => 'Поставщик',
                'field_title_kk' => 'Жеткізуші',
                'field_tag' => 'input',
                'field_name' => 'supplier',
                'field_type' => 'text',
                'field_values_url' => null,
                'field_attributes' => json_encode([
                    'placeholder' => 'Введите поставщика',
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
                'field_validation' => "string",
            ],
        ]);
    }
}
