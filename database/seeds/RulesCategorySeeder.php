<?php

use Illuminate\Database\Seeder;
use App\Models\RulesCategory;
class RulesCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RulesCategory::insert([
            [
                'title' => 'Quy định cần biết',
                'alias' => 'quy-dinh-can-biet',
            ],
            [
                'title' => 'An toàn mua bán',
                'alias' => 'an-toan-mua-ban',
            ]
        ]);   
    }
}
