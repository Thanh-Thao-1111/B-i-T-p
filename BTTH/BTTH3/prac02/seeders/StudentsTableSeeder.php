<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            $classes = DB::table('classes')->pluck('class_id')->toArray();
                DB::table("students")->insert([

                    "first_name" => $faker->firstName,
                    "last_name"=> $faker->lastName,
                    "date_of_birth" => $faker->dateTime(),
                    "parent_phone"=> $faker->phoneNumber,
                    "class_id"=> $faker->randomElement($classes),
                    
            
            ]);}
    }
}
