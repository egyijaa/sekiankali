<?php

namespace Database\Seeders;

use App\Models\items;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder
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
        $letter=['','Kran Besi','Batu Karbit', 'Pipa Air'];
        for ($i=1; $i <= 3 ; $i++) { 
            # code...
            $role = new items;
            $role->id_mou = $i;
            $role->SKU = $faker->numberBetween(1010000, 1030000);
            $role->item = $letter[$i];
            $role->harga = $faker->numberBetween(10000, 10000000);
            $role->qty = $faker->numberBetween(0, 25000);
            $role->save();
        }
    }
}
