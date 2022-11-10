<?php

namespace Database\Seeders;

use App\Models\Time;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $array = [];
        $arr = ['00', '15', '30', '45'];
        for ($i=0; $i < 24; $i++) { 
            # code...
            foreach ($arr as $j) {
                if($i < 10){
                    $value = '0' . strval($i) . ':' . $j;
                } else {
                    $value = strval($i) . ':' . $j;
                }
                array_push($array, $value);
            }
        }
        foreach($array as $each) {
            $time = new Time();
            $time->time = $each;
            $time->save();
        }
    }
}
