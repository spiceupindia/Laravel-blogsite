<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $user = User::create([
                'name' => 'Padma',
                'email' => 'padma@mca.com',
                'password' => bcrypt('password'),
                'admin' => 1
            ]);

            Profile::create([
                'user_id' => $user->id,
                'avatar' => secure_asset('uploads/avatar/sample.png'),
                'about' => 'Lorem ipsum dolar sit amed, consectetur adipisicing elit.',
                'facebook' => 'https://www.facebook.com/kati'
            ]);

    }
}
