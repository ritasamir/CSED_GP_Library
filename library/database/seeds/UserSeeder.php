<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
        DB::table('users')->insert([
            'name' => 'Dr rita',
            'isTS'=>1,
            'email' =>'rita@gmail.com',
            'password' => Hash::make('password'),
            'department' => Str::random(10),
            'phone_number' => '01274587097',
            'graduation_year' => '1997',
            'created_at'=>'2020-04-30 12:52:41.0',
            'email_verified_at' =>'2020-04-30 12:52:41.0',
            'national_id' =>'123456789'
        ]);
        DB::table('users')->insert([
            'name' => 'yomna',
            'email' =>'yomna@gmail.com',
            'password' => Hash::make('password'),
            'department' => Str::random(10),
            'phone_number' => '01274587097',
            'graduation_year' => '1997',
            'created_at'=>'2020-04-30 12:52:41.0',
            'email_verified_at' =>'2020-04-30 12:52:41.0',
            'national_id' =>'123456789'
        ]);
        DB::table('users')->insert([
            'name' => 'merit',
            'email' => 'merit@gmail.com',
            'password' => Hash::make('password'),
            'department' => Str::random(10),
            'phone_number' => '01274587097',
            'graduation_year' => '1997',
            'created_at'=>'2020-04-30 12:52:41.0',
            'email_verified_at' =>'2020-04-30 12:52:41.0',
            'national_id' =>'123456789'
        ]);
        DB::table('users')->insert([
            'name' => 'sohayla',
            'email' =>'sohayla@gmail.com',
            'password' => Hash::make('password'),
            'department' => Str::random(10),
            'phone_number' => '01274587097',
            'graduation_year' => '1997',
            'created_at'=>'2020-04-30 12:52:41.0',
            'email_verified_at' =>'2020-04-30 12:52:41.0',
            'national_id' =>'123456789'
        ]);
    }
}