<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table("computers")->insert([
                "computer_name" => $faker->word, 
                "model" => $faker->word, 
                "operating_system" => $faker->word, 
                "processor" => $faker->word, 
                "memory" => $faker->randomElement([4, 8, 16, 32]), 
                "available" => $faker->boolean, 
            ]);}
    }
}
