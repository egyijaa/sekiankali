<?php

namespace Database\Seeders;

use App\Models\customers;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create('id_ID');
        for ($i=0; $i < 3 ; $i++) { 
            $gender = $faker->randomElement(['M', 'F']);
            $letter = $faker->randomElement(['Mr', 'Ms']);
            # code...
            // if ($i > 1) {
            //     reset($letter);
            //     reset($gender);
            // }
            $customer = new customers;
            $customer->title = $letter;
            $customer->name = $faker->name($gender,$letter);
            $customer->gender = $gender;
            $customer->phone_number = '08'.$faker->numberBetween(0, 9).$faker->numberBetween(0, 9).$faker->numberBetween(0, 9).$faker->numberBetween(0, 9).$faker->numberBetween(0, 9).$faker->numberBetween(0, 9).$faker->numberBetween(0, 9).$faker->numberBetween(0, 9).$faker->numberBetween(0, 9).$faker->numberBetween(0, 9).$faker->numberBetween(0, 9);
            $customer->image = $faker->imageUrl;
            $customer->email = $faker->unique()->email;
            $customer->save();
        }
    }
}
