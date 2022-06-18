<?php

use Illuminate\Database\Seeder;
use App\Sport;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sport::create([
            'name'=>'テニス',
        ]);
        Sport::create([
            'name'=>'サッカー',
        ]);
        Sport::create([
            'name'=>'野球',
        ]);
        Sport::create([
            'name'=>'バレーボール',
        ]);
        Sport::create([
            'name'=>'バスケットボール',
        ]);
    }
}


