<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'鏡昂也',
            'email'=>'ec200209@meiji.ac.jp',
            'password'=>'meiji',
            'remember_token'=>'gym',
            'gender'=>'男性',
            'hometown'=>'東京都北区',
            'interest'=>'テニス',
            'age'=>20,
            'telephone'=>"080-1234-5678"
        ]);

        User::create([
            'name'=>'鏡綾人' ,
            'email'=>'ed200209@meiji.ac.jp',
            'password'=>'kokugakuin',
            'remember_token'=>'diet',
            'gender'=>'男性',
            'hometown'=>'東京都北区',
            'interest'=>'サッカー',
            'age'=>18,
            'telephone'=>"090-1234-5678"
        ]);
    }
}
