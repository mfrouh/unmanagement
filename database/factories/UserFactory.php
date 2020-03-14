<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\group;
use App\parentgroup;
use App\student_details;
use App\subject;
use App\teacher_details;
use App\teacherassistant_details;
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('12345678'), // password
        'remember_token' => Str::random(10),
        'role' =>$faker->randomElement($array = array ('teacher','student','teacherassistant')),
    ];
});
$factory->define(parentgroup::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
$factory->define(group::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'countofsection' =>rand(1,10),
        'parentgroup_id' =>parentgroup::all()->random()->id,
    ];
});
$factory->define(student_details::class, function (Faker $faker) {
    return [
        'address' => $faker->address,
        'gender' =>'male',
        'phone_number' =>'012'.rand(00000000,99999999),
        'date_of_birth'=>$faker->date(),
        'group_id'=>group::all()->random()->id,
        'user_id'=>User::where('role','student')->get()->random()->id,
    ];
});
$factory->define(teacher_details::class, function (Faker $faker) {
    return [
        'address' => $faker->address,
        'gender' =>'male',
        'phone_number' =>'012'.rand(00000000,99999999),
        'date_of_birth'=>$faker->date(),
        'user_id'=>User::where('role','teacher')->get()->random()->id,

    ];
});
$factory->define(teacherassistant_details::class, function (Faker $faker) {
    return [
        'address' => $faker->address,
        'gender' =>'male',
        'phone_number' =>'012'.rand(00000000,99999999),
        'date_of_birth'=>$faker->date(),
        'user_id'=>User::where('role','teacherassistant')->get()->random()->id,

    ];
});
$factory->define(subject::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'group_id'=>group::all()->random()->id,
        'user_id'=>User::where('role','teacher')->get()->random()->id,
        'teacherassistant'=>json_encode([User::where('role','teacher')->get()->random()->id,User::where('role','teacher')->get()->random()->id]),
    ];
});
