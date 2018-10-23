<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++) {
            DB::table('posts')->insert([
                'title' => str_random(20),
                'body' => str_random(100),
                'author' => str_random(10),
                'state' => $i%4,
                'hits' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
