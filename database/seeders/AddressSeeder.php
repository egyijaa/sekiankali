<?php

namespace Database\Seeders;

use App\Models\address;
use App\Models\Regency;
use App\Models\District;
use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $kecamatan  = '';
        $kota  = '';
        $provinsi  = '';
        $letter = 1;
        $p = ['Jawa Barat', 'Kalimantan Barat', 'Jawa Barat'];
        $k = ['Bandung', 'Pontianak', 'Bekasi'];
        $d = ['Coblong', 'Pontianak Utara', 'Cikarang Selatan'];
        $faker = \Faker\Factory::create('id_ID');
        for ($i=0 ; $i < 3 ; $i++) { 
            $kecamatan = '';
            $address = new address;
            $address->customer_id = $letter;
            $address->address = $faker->streetAddress;
            $address->district = $d[$i];
            $address->city = $k[$i];
            $address->province= $p[$i];
            $address->postal_code= $faker->postcode();
            $address->save();
            $letter++;
        }
    }
}
