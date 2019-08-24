<?php

use App\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = [
            [
                'user_id' => 1,
                'slug' => 'lorem-1',
                'title' => 'News Title 1',
                'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sapiente mollitia accusamus quae, ex sunt facilis unde enim maiores illum ratione autem quas veritatis possimus tempora accusantium et modi at omnis. Lorem ipsum dolor sit amet',
                'images' => 'news/news-1.png'
            ],
            [
                'user_id' => 1,
                'slug' => 'lorem-2',
                'title' => 'News Title 2',
                'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sapiente mollitia accusamus quae, ex sunt facilis unde enim maiores illum ratione autem quas veritatis possimus tempora accusantium et modi at omnis. Lorem ipsum dolor sit amet',
                'images' => 'news/news-2.png'
            ],
            [
                'user_id' => 1,
                'slug' => 'lorem-3',
                'title' => 'News Title 3',
                'content' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sapiente mollitia accusamus quae, ex sunt facilis unde enim maiores illum ratione autem quas veritatis possimus tempora accusantium et modi at omnis. Lorem ipsum dolor sit amet',
                'images' => 'news/news-3.png'
            ]
        ];

        foreach ($news as $new => $content) {
            News::create($content);
        }
    }
}
