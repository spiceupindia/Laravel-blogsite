<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Tag::create([
            'id' => '1',
            'tag' => 'php'
        ]);

        \App\Tag::create([
            'id' => '2',
            'tag' => 'seo'
        ]);

        \App\Tag::create([
            'id' => '3',
            'tag' => 'laravel'
        ]);
    }
}
