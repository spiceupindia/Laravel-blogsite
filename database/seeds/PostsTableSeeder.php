<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Post::create([
            'id' => '1',
            'title' => 'Laravel Installation',
            'slug' => 'laravel-installation',
            'user_id' => '1',
            'category_id' => '1',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto excepturi in temporibus natus laboriosam mollitia architecto ullam assumenda cumque incidunt omnis, dolorum aliquid aliquam obcaecati saepe repellat iste illum modi.',
            'featured' => asset('uploads/posts/sample.jpg'),
        ]);

        \App\Post::create([
            'id' => '2',
            'title' => 'Basic Routing',
            'slug' => 'basic-routing',
            'user_id' => '1',
            'category_id' => '2',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto excepturi in temporibus natus laboriosam mollitia architecto ullam assumenda cumque incidunt omnis, dolorum aliquid aliquam obcaecati saepe repellat iste illum modi.',
            'featured' => asset('uploads/posts/sample.jpg'),
        ]);

        \App\Post::create([
            'id' => '3',
            'title' => 'Controller Resource',
            'slug' => 'controller-resource',
            'user_id' => '2',
            'category_id' => '1',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto excepturi in temporibus natus laboriosam mollitia architecto ullam assumenda cumque incidunt omnis, dolorum aliquid aliquam obcaecati saepe repellat iste illum modi.',
            'featured' => asset('uploads/posts/sample.jpg'),
        ]);

        \App\Post::create([
            'id' => '4',
            'title' => 'Database Migration',
            'slug' => 'database-migration',
            'user_id' => '1',
            'category_id' => '2',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto excepturi in temporibus natus laboriosam mollitia architecto ullam assumenda cumque incidunt omnis, dolorum aliquid aliquam obcaecati saepe repellat iste illum modi.',
            'featured' => asset('uploads/posts/sample.jpg'),
        ]);

        \App\Post::create([
            'id' => '5',
            'title' => 'Stripe API',
            'slug' => 'stripe-api',
            'user_id' => '2',
            'category_id' => '1',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto excepturi in temporibus natus laboriosam mollitia architecto ullam assumenda cumque incidunt omnis, dolorum aliquid aliquam obcaecati saepe repellat iste illum modi.',
            'featured' => asset('uploads/posts/sample.jpg'),
        ]);

        \App\Post::create([
            'id' => '6',
            'title' => 'Factory and Seeder',
            'slug' => 'factory-and-seeder',
            'user_id' => '1',
            'category_id' => '2',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto excepturi in temporibus natus laboriosam mollitia architecto ullam assumenda cumque incidunt omnis, dolorum aliquid aliquam obcaecati saepe repellat iste illum modi.',
            'featured' => asset('uploads/posts/sample.jpg'),
        ]);
    }
}
