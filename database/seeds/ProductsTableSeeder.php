<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('products')->insert([
            'name' => 'Black T-shirt',
            'model' => 'BASIC',
            'number' => $faker->unique->randomNumber($nbDigits = 9,$strict = false),
            'description' => 'Something',
            'quantity_in_stocks' => '2',
            'price' => '20',
            'warranty_status' => '2 years',
            'distributor_info' => 'Jack and Jones',
            'category_id' => '1',
            'image' => 'https://cdn-occ.akinon.net/products/2019/03/05/119670/77529acd-9212-4564-ae5f-9c7482310402_size780x780_quality100_cropCenter.jpg',
        ]);
        DB::table('products')->insert([
            'name' => 'LOGO CANVAS SNEAKERS',
            'model' => 'Canvas sneakers',
            'number' => $faker->unique->randomNumber($nbDigits = 9,$strict = false),
            'description' => 'Something',
            'quantity_in_stocks' => '10',
            'price' => '35',
            'warranty_status' => '3 years',
            'distributor_info' => 'Jack and Jones',
            'category_id' => '2',
            'image' => 'https://www.jackjones.com/dw/image/v2/ABBT_PRD/on/demandware.static/-/Sites-pim-catalog/default/dwb8a521ed/pim-static/large/12184168_Anthracite_001_ProductLarge.jpg?sw=685',
        ]);
        DB::table('products')->insert([
            'name' => 'PAUL FLAKE AKM 542 CARGO PANTS',
            'model' => 'Paul Flake AKM 542',
            'number' => $faker->unique->randomNumber($nbDigits = 9,$strict = false),
            'description' => 'Something',
            'quantity_in_stocks' => '5',
            'price' => '45',
            'warranty_status' => '1 years',
            'distributor_info' => 'Jack and Jones',
            'category_id' => '3',
            'image' => 'https://www.jackjones.com/dw/image/v2/ABBT_PRD/on/demandware.static/-/Sites-pim-catalog/default/dw98e8397e/pim-static/large/12139912_Black_003_ProductLarge.jpg?sw=685',
        ]);
    }
}
