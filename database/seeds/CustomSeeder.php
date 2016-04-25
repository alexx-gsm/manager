<?php

use Illuminate\Database\Seeder;
use App\Custom;

class CustomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $custom = new Custom();
        $custom->name_last = 'Иванов';
        $custom->name_first = 'Иванов';
        $custom->name_middle = 'Иванов';
        $custom->phone = '555-55-55';
        $custom->email = 'ivan@ivanov.com';
        $custom->city = 'Барнаул';
        $custom->street = 'Ивановская';
        $custom->building = '123';
        $custom->flat = '15';
        $custom->card_id = 384;
        $custom->save();

        $custom = new Custom();
        $custom->pid = 1;
        $custom->name_last = 'Петров';
        $custom->name_first = 'Петр';
        $custom->name_middle = 'Петрович';
        $custom->phone = '666-6-777-7';
        $custom->email = 'peter@ivanov.com';
        $custom->city = 'Барнаул';
        $custom->street = 'Ивановская';
        $custom->building = '123';
        $custom->flat = '15';
        $custom->save();

        $custom = new Custom();
        $custom->name_last = 'Иванов';
        $custom->name_first = 'Иванов';
        $custom->name_middle = 'Иванов';
        $custom->phone = '555-55-55';
        $custom->email = 'ivan@ivanov.com';
        $custom->city = 'Барнаул';
        $custom->street = 'Ивановская';
        $custom->building = '123';
        $custom->flat = '15';
        $custom->save();

    }
}
