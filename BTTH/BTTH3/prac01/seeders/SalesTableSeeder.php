<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $medicinesId = DB::table('medicines')->pluck('medicine_id')->toArray();
        for ($i = 0; $i < 100; $i++) {
            DB::table("sales")->insert([

                "medicine_id" => $faker->randomElement($medicinesId),
                'quantity' => $faker->numberBetween(1,100),
                "sale_date" => $faker->dateTime(),
                "customer_phone" => $faker->phoneNumber,
            ]);
        }
    }
}
