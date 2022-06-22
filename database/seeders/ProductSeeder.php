<?php

namespace Database\Seeders;

use App\Models\Product;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10000; $i++) {

            $products[] = [
                'name'          => $faker->sentence(3),
                'type_code'     => Str::random(5),
                'description'   => $faker->paragraph,
                'quantity'      => $faker->numberBetween(1, 99),
                'price'         => $faker->randomFloat(2, 1, 999),
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ];

        } // End for

        $chunks = array_chunk($products, 350);
        foreach ($chunks as $chunk) {
            Product::insert($chunk);
        } // End foreach


    } // End Function 
} // End class