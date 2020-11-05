<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'name' => 'IT飲み会',
            'genre_id' => '2',
            'user_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'img' => 'public/icons/irasutoya1.png',
            'intro' => 'セブ在住のエンジニアいっぱいでで飲み会しましょう〜〜〜〜〜〜〜。',
        ]);
        DB::table('groups')->insert([
            'name' => '週１フットサルしようよ！',
            'genre_id' => '1',
            'user_id' => '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'img' => 'public/icons/irasutoya2.png',
            'intro' => '毎週土曜日の朝フットサルしたい人〜〜〜〜！！',
        ]);
        DB::table('groups')->insert([
            'name' => 'laravelお勉強',
            'genre_id' => '3',
            'user_id' => '3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'img' => 'public/icons/irasutoya3.png',
            'intro' => 'laravel の疑問を協力して解決しあおう！',
           ]);
        DB::table('groups')->insert([
            'name' => '童貞卒業相談所',
            'genre_id' => '6',
            'user_id' => '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'img' => 'public/icons/irasutoya4.png',
            'intro' => '童貞の相談に乗ってあげましょう！',
        ]);
    }
}
