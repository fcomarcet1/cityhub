<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $service=new \App\Service\Services([
            'img_path'=>'slide1.jpeg',
            'title'   =>'Bakery'
        ]);
         $service->save();

         $service=new \App\Service\Services([
            'img_path'=>'slide2.jpeg',
            'title'   =>'Vehicle Repair'
        ]);
         $service->save();

         $service=new \App\Service\Services([
            'img_path'=>'slide3.jpeg',
            'title'   =>'Photoshoot'
        ]);
         $service->save();

         $service=new \App\Service\Services([
            'img_path'=>'slide1.jpeg',
            'title'   =>'Kirana Store'
        ]);
         $service->save();
    }
}
