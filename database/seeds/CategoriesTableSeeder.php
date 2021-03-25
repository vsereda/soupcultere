<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'title' => 'Супы',
            'description' => 'описание для Супы',
            'img' => 'http://loremflickr.com/640/480/food',
        ]);
        DB::table('categories')->insert([
            'title' => 'Фалафель',
            'description' => 'описание для Фалафель',
            'img' => 'http://loremflickr.com/640/480/food',
        ]);
        DB::table('categories')->insert([
            'title' => 'Десерты',
            'description' => 'описание для Десерты',
            'img' => 'http://loremflickr.com/640/480/food',
        ]);
        DB::table('categories')->insert([
            'title' => 'Напитки',
            'description' => 'описание для Напитки',
            'img' => 'http://loremflickr.com/640/480/food',
        ]);
        DB::table('categories')->insert([
            'title' => 'Другое',
            'description' => 'описание для Другое',
            'img' => 'http://loremflickr.com/640/480/food',
        ]);
    }
}
