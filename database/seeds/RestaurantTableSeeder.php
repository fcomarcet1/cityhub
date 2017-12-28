<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $restaurant=new App\Service\Food\Restaurant([
        	'img_path'=>'rs1.jpg',
        	'name'	  =>'bobina'
        ]);
        $restaurant->save();

        $restaurant=new App\Service\Food\Restaurant([
        	'img_path'=>'rs1.jpg',
        	'name'	  =>'mr cook'
        ]);
        $restaurant->save();

        $restaurant=new App\Service\Food\Restaurant([
        	'img_path'=>'rs1.jpg',
        	'name'	  =>'ganesh'
        ]);
        $restaurant->save();
    }
}
