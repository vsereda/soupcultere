<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servings')->insert([
            'title' => 'стакан 200 мл',
        ]);
        DB::table('servings')->insert([
            'title' => 'стакан 350 мл',
        ]);
        DB::table('servings')->insert([
            'title' => '250 мл',
        ]);
        DB::table('servings')->insert([
            'title' => '350 мл',
        ]);
        DB::table('servings')->insert([
            'title' => '1 шт',
        ]);
        DB::table('servings')->insert([
            'title' => '330 мл',
        ]);
        DB::table('servings')->insert([
            'title' => '500 мл',
        ]);
    }
}
