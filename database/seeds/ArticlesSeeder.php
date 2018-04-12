<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        первый способ
        DB::insert(
            'INSERT INTO `articles` (`name`, `text`, `img`) VALUES (?, ?, ?)',
            [
                'articleName',
                'someText',
                'img.jpg'
            ]
        );

//        второй способ
        DB::table('articles')->insert(
            [
                [
                    'name' =>'1articleName',
                    'text' => '1someText',
                    'img' =>'1img.jpg'
                ],
                [
                    'name' => '2articleName',
                    'text' => '2someText',
                    'img' => '2img.jpg'
                ],
            ]
        );

//        третий способ
        Article::create([
            'name' => 'articleName',
            'text' => 'Hello text',
            'img' => 'img.jpg',
        ]);

    }
}
