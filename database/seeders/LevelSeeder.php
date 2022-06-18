<?php

use Illuminate\Database\Seeder;
use App\Level;


class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        Level::create([
            'name'=>'初心者',
        ]);
        Level::create([
            'name'=>'初中級者',
        ]);
        Level::create([
            'name'=>'中級者',
        ]);
        Level::create([
            'name'=>'中上級者',
        ]);
        Level::create([
            'name'=>'上級者',
        ]);
    
    }
}
