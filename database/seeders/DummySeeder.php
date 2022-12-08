<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// DB::table('dummy_table')->truncate();
    	// die();
    	for ($i=0; $i <=100 ; $i++) { 
    		DB::table('dummy_table')->insert([
    			'title' => Str::random(10),
    			'address' => Str::random(10),
    			'country' => Str::random(6),
    			'city' => Str::random(6),
    			'address' => Str::random(10),
    			'postal_code' => rand(1, 5),
    		]);
    	}
    }
}
