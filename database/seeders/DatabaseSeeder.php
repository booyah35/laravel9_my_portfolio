<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        // $this->call(SportSeeder::class);
        // $this->call(LevelSeeder::class);
        Event::factory(50)->create();
    }
}
