<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('domens')->insertOrIgnore([
            ['name' => 'hostling.ru', 'domenDate' => '2020-02-03', 'hostDate' => '2019-10-26', 'comment' => 'Мой домен', 'domenPrice' => '200', 'hostPrice'=> '0'],
        ]);
    }
}
