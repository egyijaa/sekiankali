<?php

namespace Database\Seeders;

use App\Models\mous;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MousSeeder extends Seeder
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
        $letter=['Pcs','Kg', 'Meter'];
        for ($i=0; $i < 3 ; $i++) { 
            # code...
            $role = new mous;
            $role->mou = $letter[$i];
            $role->save();
        }
    }
}
