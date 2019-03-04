<?php

use Faker\Generator as Faker;
use App\Models\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'        => $faker->unique()->word,
        'price'       => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 500),        
        'description' => $faker->sentence(),
        'category_id' => $faker->numberBetween($min = 1, $max = 9)
    ];
});
