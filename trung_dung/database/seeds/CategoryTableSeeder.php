<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Factory::create();
        for ($i=0; $i<20 ; $i++){
         $item = [
          'cate_name' => $fake->name
         ];
        }
    }
}
