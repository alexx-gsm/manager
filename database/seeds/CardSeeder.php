<?php

use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @property string @number - unique number of card are printed on the each card
     *
     * @return void
     */
    public function run()
    {
        $card = new \App\Card();
        $card->number = '000-384';
        $card->type = '20%';
        $card->save();

        $card = new \App\Card();
        $card->number = '000-385';
        $card->type = '20%';
        $card->save();

        $card = new \App\Card();
        $card->number = '000-386';
        $card->type = '20%';
        $card->save();
    }
}
