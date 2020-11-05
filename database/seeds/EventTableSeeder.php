<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'name' => 'basketball',
            'genre_id' => '1',
            'user_id' => '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'img' => 'public/icons/irasutoya1.png',
            'intro' => 'バスケするよーーーーーーーーーー',
            'startTime' => '2019-12-24 09:00:00',
            'finishTime' => '2019-12-24 12:00:00',
        ]);
        DB::table('events')->insert([
            'name' => 'クリスマスパーティー',
            'genre_id' => '6',
            'user_id' => '3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'img' => 'public/icons/irasutoya2.png',
            'intro' => 'IT park のコワーキングスペースでクリスマスパーティー！',
            'startTime' => '2019-12-25 18:00:00',
            'finishTime' => '2019-12-25 20:00:00',
        ]);
        DB::table('events')->insert([
            'name' => 'ボーリング大会',
            'genre_id' => '1',
            'user_id' => '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'img' => 'public/icons/irasutoya5.png',
            'intro' => 'バレーーするよーーーーーーーーーー',
            'startTime' => '2019-12-15 09:00:00',
            'finishTime' => '2019-12-15 12:00:00',
        ]);
        DB::table('events')->insert([
            'name' => 'ジンベエザメこんにちわ！',
            'genre_id' => '3',
            'user_id' => '3',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'img' => 'public/icons/irasutoya6.png',
            'intro' => 'オスロブにみんなで行ってジンベエザメと一緒に泳ごう！',
            'startTime' => '2020-01-01 03:00:00',
            'finishTime' => '2020-01-01 15:00:00',
        ]);

    }
}
