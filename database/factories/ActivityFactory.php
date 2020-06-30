<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Activity;
use Faker\Generator as Faker;

$factory->define(Activity::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    ];
});
