<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Questions;
use Faker\Generator as Faker;

$factory->define(Questions::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        //make faker 
        'title' => $title, 
        'slug' => str_slug($title),
        'body' => $faker->text(),
        'category_id' => function(){
            return App\Model\Category::all()->random();
        },
        'user_id' => function(){
            return \App\User::all()->random();
        }

    ];
});
