<?php

use Illuminate\Database\Seeder;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $action = new \App\Actions();
        $action->name = 'мойка окна';
        $action->value = '300';
        $action->cat_id = '1';
        $action->subcat_id = '1';
        $action->save();

        $action = new \App\Actions();
        $action->name = 'уборка квартиры';
        $action->value = '5000';
        $action->cat_id = '1';
        $action->subcat_id = '1';
        $action->save();

        $action = new \App\Actions();
        $action->name = 'уборка офиса';
        $action->value = '2000';
        $action->cat_id = '1';
        $action->subcat_id = '1';
        $action->save();
    }
}
