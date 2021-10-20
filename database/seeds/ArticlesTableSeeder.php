<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 記事のダミーデータを生成
        factory(App\Article::class, 30)->create();
    }
}
