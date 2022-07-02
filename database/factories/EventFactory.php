<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->title(),
            'outline'=> $this->faker->paragraph(4),
            'address'=> $this->faker->address(),
            'event_date'=> $this->faker->date('Y-m-d'),
            'start_time'=> $this->faker->time('H:i:s'),
            'finish_time'=> $this->faker->time('H:i:s'),
            'capacity'=> $this->faker->numberBetween($min=2, $max=30),
            'sport_id'=> $this->faker->numberBetween(1,5),
            'host_id'=> $this->faker->numberBetween(1,1),
            'level_id'=> $this->faker->numberBetween(1,5)
        ];
    }
}
