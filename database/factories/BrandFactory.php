<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    
       return [
    	'name' => $faker->company,
    	'photo' => 'backendtemplate/brandimg/'.$faker->image('public/backendtemplate/brandimg', 200, 150, 'fashion', null, false)
];
    
});
