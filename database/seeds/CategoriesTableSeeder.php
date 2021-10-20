<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // カテゴリーの配列を作成
        $categoriesList = [
            'コーヒー豆',
            'コーヒーメーカー',
            'グッズ',
            'カフェ',
            'その他',
        ];

        // カテゴリーの数のぶんループして、データを作成
        foreach ($categoriesList as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

    }
}
