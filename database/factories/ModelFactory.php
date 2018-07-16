<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});



#=====================  P  O  S  T  ============================
# paso 3
#----- source: https://github.com/fzaninotto/Faker
$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'contenido' => $faker->sentence,
        'image' => 'photo1.png',
        'date' => '08/09/18',
        'views'	=>	$faker->numberBetween(0, 5000),
        'category_id'	=>	1,
        'user_id'	=>	1,
        'status'	=>	1,
        'is_featured'	=>	0
    ];
});
#=====================  CATEGORY  ======================
# si todoo el contenido va ser fake sigue los pasos..
# ...de lo contrario ignora category y tags.
# pasos 1 : php artisan tinker
# factory(App\Category::class,2 )->create();

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
    ];
});
#=====================  T A G S  ========================
# paso 2
$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
    ];
});