<?php

use App\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = [
            [
                'user_id' => 1,
                'news_id' => 1,
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates at expedita odit deserunt cumque ullam perferendis, vel officiis eveniet obcaecati, deleniti facere ab? Nihil provident magni nisi culpa dolor facilis.'
            ],
            [
                'user_id' => 2,
                'news_id' => 1,
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates at expedita odit deserunt cumque ullam perferendis, vel officiis eveniet obcaecati, deleniti facere ab? Nihil provident magni nisi culpa dolor facilis.'
            ],
            [
                'user_id' => 3,
                'news_id' => 1,
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates at expedita odit deserunt cumque ullam perferendis, vel officiis eveniet obcaecati, deleniti facere ab? Nihil provident magni nisi culpa dolor facilis.'
            ]
        ];

        foreach ($comments as $comment => $value) {
            Comment::create($value);
        }
    }
}
