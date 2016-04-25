<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\Category();
        $category->name = 'Химчистка';
        $category->parent = 0;

        $category->save();

        $category = new \App\Category();
        $category->name = 'Уборка офиса';
        $category->parent = 0;

        $category->save();

        $category = new \App\Category();
        $category->name = 'Уборка территорий';
        $category->parent = 0;

        $category->save();
    }
}
