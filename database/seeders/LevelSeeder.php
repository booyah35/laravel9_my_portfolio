<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Level;


class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        DB::table('levels')->insert([
            'name'=>'初心者',
        ]);
        DB::table('levels')->insert([
            'name'=>'初中級者',
        ]);
        DB::table('levels')->insert([
            'name'=>'中級者',
        ]);
        DB::table('levels')->insert([
            'name'=>'中上級者',
        ]);
        DB::table('levels')->insert([
            'name'=>'上級者',
        ]);
    
    }
}
