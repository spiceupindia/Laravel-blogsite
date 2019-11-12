<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::create([
            'id' => '1',
            'name' => 'Laravel'
        ]);

        \App\Category::create([
            'id' => '2',
            'name' => 'PHP'
        ]);
    }
}
