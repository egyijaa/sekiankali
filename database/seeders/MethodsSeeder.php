<?php

namespace Database\Seeders;

use App\Models\methods;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MethodsSeeder extends Seeder
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
        $letter=['Cash', 'Debit', 'Kredit', 'Lainnya'];
        for ($i=0; $i < 4 ; $i++) { 
            # code...
            $method = new methods;
            $method->method = $letter[$i];
            $method->save();
        }
    }
}
