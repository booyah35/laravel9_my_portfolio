<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'name'=> $this->faker->name();
        'outline'=> $this->faker->paragragh(4);
        'address'=> $this->faker->address();
        'event_date'=> $this->faker->date('Y-m-d');
        'start_time'=> $this->faker->time('H:i:s');
        'finish_time'=> $this->faker->time('H:i:s');
        'capacity'=> $this->faker->numberBetween($min=2, $max=30);
        'sport_id'=> $this->faker->rand(1,5);
        'host_id'=> $this->faker->rand(1,3);
        'level_id'=> $this->faker->rand(1,5);
    ];
});
