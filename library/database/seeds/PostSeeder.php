<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'user_id' => 1,
            'title'=>'PostFromDoctorRita',
            'avatar' =>'PostFromDoctorRita',
            'abstract' => 'PostFromDoctorRitaPostFromDoctorRita PostFromDoctorRitaPostFromDoctorRita PostFromDoctorRita PostFromDoctorRita PostFromDoctorRita PostFromDoctorRita PostFromDoctorRita PostFromDoctorRita PostFromDoctorRita PostFromDoctorRita PostFromDoctorRita PostFromDoctorRita',
            'doc_url' => 'https://laravel.com/docs/7.x/seeding',
            'approved' => 1,
            'created_at'=>'2020-04-30 12:52:41.0',
        ]);
    }
}
