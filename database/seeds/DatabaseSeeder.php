<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foods')->insert([
            [
                'seller_id' => 1,
                'name' => 'bacon',
                'image_name' => 'seeder/bacon.jpg',
                'price' => 75,
                'quantity' => 12
            ],
            [
                'seller_id' => 1,
                'name' => 'beef',
                'image_name' => 'seeder/beef.jpg',
                'price' => 125,
                'quantity' => 10
            ],
            [
                'seller_id' => 1,
                'name' => 'chicken',
                'image_name' => 'seeder/chicken.jpg',
                'price' => 110,
                'quantity' => 19
            ],
            [
                'seller_id' => 1,
                'name' => 'fish',
                'image_name' => 'seeder/fish.jpg',
                'price' => 130,
                'quantity' => 15
            ],
            [
                'seller_id' => 1,
                'name' => 'pork',
                'image_name' => 'seeder/pork.jpg',
                'price' => 145,
                'quantity' => 10
            ],
        ]);
    }
}
