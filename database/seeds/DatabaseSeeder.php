<?php

use App\Article;
use App\Category;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 外部キー制約を一度解除
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // 既にテーブルにあるデータを全削除する
        Article::truncate();
        Category::truncate();
        User::truncate();

        // seederファイルからカテゴリーデータを登録
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);

        // 外部キー制約を再設定
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
