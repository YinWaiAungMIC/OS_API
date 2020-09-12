<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    
       return [
    	'name' => $faker->name,
    	'photo' => 'backendtemplate/brandimg/'.$faker->image('public/backendtemplate/brandimg', 400, 300,null, false),
];
    
});
