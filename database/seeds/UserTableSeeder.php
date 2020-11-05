<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'itsuki',
            'email' => 'itsuki@gmail.com',
            'password' => 'itsuki1234',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
             'gender' => '1',
             'age' => '23',
             'address' => 'La Guardia Flat2',
             'intro' => 'こんにちは、いつきです。',
            'img' => 'public/icons/irasutoya1.png',
            'occupation' =>'大学生',
        ]);
        DB::table('users')->insert([
            'name' => 'taka',
            'email' => 'taka@gmail.com',
            'password' => 'taka1234',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'gender' => '1',
            'age' => '22',
            'address' => 'La Guardia Flat2',
            'intro' => 'こんにちは、たかです。',
            'img' => 'public/icons/irasutoya3.png',
            'occupation' =>'大学生',
        ]);
        DB::table('users')->insert([
            'name' => 'shige',
            'email' => 'shige@gmail.com',
            'password' => 'shige1234',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'gender' => '1',
            'age' => '30',
            'address' => 'La Guardia Flat2',
            'intro' => 'こんにちは、しげです。',
            'img' => 'public/icons/irasutoya5.png',
            'occupation' =>'おじさん',
        ]);
    }
}
