<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++) {
            App\Comment::create([
                'body' => str_random(20),
                'post_id' => rand(1, 10)
            ]);
        }
    }
}
