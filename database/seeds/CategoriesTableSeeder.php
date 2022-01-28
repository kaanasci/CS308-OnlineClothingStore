<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = array('T-shirt','Shoes','Trousers');
        $count = count($names);
        foreach(range(0,$count-1) as $value){
            DB::table('categories')->insert([
                'name' => $names[$value],
                ]);
        }
    }
}
