<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=1; $i < 20 ; $i++) { 
            # code...
            DB::table('categories')->insert([
                'description' => 'category'.$i,
                'status' => 1,
                'created_at' => date("Y-m-d")
            ]);
        }
    }
}
