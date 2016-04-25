<?php

use Illuminate\Database\Seeder;

class ObjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $obj = new \App\Object();
        $obj->name = 'Край';
        $obj->city = 'Барнаул';
        $obj->street = 'пр-т Ленина';
        $obj->building = '25';
        $obj->flat = '-';

        $obj->save();

        $obj = new \App\Object();
        $obj->name = 'Си-Трейд';
        $obj->city = 'Барнаул';
        $obj->street = 'Л.Толстого';
        $obj->building = '22';
        $obj->flat = '-';

        $obj->save();

        $obj = new \App\Object();
        $obj->name = 'ЧЛ';
        $obj->city = 'Барнаул';
        $obj->street = 'пр-т Социалистический';
        $obj->building = '107';
        $obj->flat = '35';

        $obj->save();

        $obj = new \App\Object();
        $obj->name = 'ЧЛ';
        $obj->city = 'Барнаул';
        $obj->street = 'Юрина';
        $obj->building = '10';
        $obj->flat = '108';

        $obj->save();
    }
}
