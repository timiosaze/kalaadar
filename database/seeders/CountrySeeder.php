<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $lines = file('public/files/countries.txt', FILE_IGNORE_NEW_LINES);
        foreach($lines as $index => $line) {
            $country = new Country;
            $country->name = $line;
            $country->save();
        }
    }
}
