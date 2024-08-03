<?php

// database/seeders/SubcategoriesTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Инструменты' => [
                'Строительные инструменты',
                'Садовые инструменты',
                'Электроинструменты',
                'Измерительные инструменты',
                'Ручные инструменты'
            ],
            'Бизнес и услуги' => [
                'Рекламные услуги',
                'Юридические услуги',
                'Финансовые услуги',
                'Транспортные услуги',
                'Образовательные услуги',
                'Информационные технологии',
                'Услуги для дома',
                'Здравоохранение и медицина'
            ],
        ];

        foreach ($categories as $categoryName => $subcategories) {
            $category = DB::table('categories')->where('name', $categoryName)->first();
            foreach ($subcategories as $subcategoryName) {
                DB::table('subcategories')->insert([
                    'name' => $subcategoryName,
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}

