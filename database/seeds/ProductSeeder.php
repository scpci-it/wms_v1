<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => "Real Coco Pure Case x 12",
            'code' => "TP-RCP",
            'category_id' => 1,
            'updated_at' => NOW(),
            'created_at' => NOW(),
        ]);

        DB::table('products')->insert([
            'name' => "H2Coco Plain Case x 12",
            'code' => "TP-H2P",
            'category_id' => 1,
            'updated_at' => NOW(),
            'created_at' => NOW(),
        ]);

        DB::table('products')->insert([
            'name' => "Drums",
            'code' => "DRM",
            'category_id' => 2,
            'updated_at' => NOW(),
            'created_at' => NOW(),
        ]);

        DB::table('products')->insert([
            'name' => "Carton",
            'code' => "CRTN",
            'category_id' => 2,
            'updated_at' => NOW(),
            'created_at' => NOW(),
        ]);

        DB::table('products')->insert([
            'name' => "Aseptic Bag",
            'code' => "AB",
            'category_id' => 2,
            'updated_at' => NOW(),
            'created_at' => NOW(),
        ]);

        DB::table('products')->insert([
            'name' => "Sodium Metabisulfite",
            'code' => " Na2S2O5",
            'category_id' => 3,
            'updated_at' => NOW(),
            'created_at' => NOW(),
        ]);

        DB::table('products')->insert([
            'name' => "Ascobric Acid",
            'code' => "AS",
            'category_id' => 3,
            'updated_at' => NOW(),
            'created_at' => NOW(),
        ]);

        DB::table('products')->insert([
            'name' => "Screws",
            'code' => "SCRW",
            'category_id' => 4,
            'updated_at' => NOW(),
            'created_at' => NOW(),
        ]);

		DB::table('products')->insert([
            'name' => "Bolts",
            'code' => "BLTS",
            'category_id' => 4,
            'updated_at' => NOW(),
            'created_at' => NOW(),
        ]);
	}
}
