<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        for ($i = 1; $i < 8000; $i++) {
            DB::table('customers')->insert([
                'identity_number' => rand(),
                'customer_name' => $faker->name(),
                'company' => $faker->company(),
                'address' => $faker->address(),
                'phone' => $faker->phoneNumber(),
                'email' => $faker->safeEmail(),
            ]);
        }

        //
    }
}
