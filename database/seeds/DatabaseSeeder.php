<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\Category;
use App\Model\Like;
use App\Model\Questions;
use App\Model\Reply;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(User::class, 20)->create();
        factory(Category::class, 20)->create();
        factory(Questions::class, 20)->create();
        factory(Reply::class, 20)->create()->each(function ($reply){
            return $reply->like()->save(factory(Like::class)->make());
        });
    }
}
