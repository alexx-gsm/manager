<?php

namespace App\Http\Controllers;

use App\Card;
use App\Custom;
use Illuminate\Http\Request;


use App\Http\Requests;

class CardController extends Controller
{
    public function getAll()
    {
        $cards = Card::all();

        $customs = \DB::table('customs')
            ->select('id', 'name_last', 'name_first', 'name_middle')
            ->get();

        $customs_array = [];
        foreach ($customs as $custom) {
            $customs_array[$custom->id] = $custom->name_last . ' ' .$custom->name_first . ' ' .$custom->name_middle;
        }

        return view('cards.cards', ['cards' => $cards, 'customs' => $customs_array, 'title' => 'Карты']);
    }
    
    public function getOne($id = null)
    {
        $card = Card::find($id);
        $custom = Custom::find($card->custom_id);
        if (!$custom == null) {
            $custom_name = $custom->name_last . ' ' . $custom->name_first . ' ' . $custom->name_middle;
        } else {
            $custom_name = '';
        }

        return view('cards.card', ['card' => $card, 'custom_name' => $custom_name, 'title' => 'Карта']);
    }
    
    public function save(Request $request)
    {
        $card = isset($request->id) ? Card::find($request->id) : (new Card());

        $card->number = $request->number;
        $card->type = $request->type;
        $card->save();
        return view('cards.card', ['card' => $card, 'custom_name' => '', 'title' => 'Карта']);
    }

    public function getList(Request $request)
    {
        if( $request->ajax() ) {

            $cards = \DB::table('cards')
                ->select('*')
                ->where('custom_id', '==', null)
                ->get();

            $resp = '';
            foreach ($cards as $card) {
                $selected = '';
                if ($card->id == $request->card_id) {
                    $selected = 'selected';
                }
                $resp .= '<option value="' . $card->id . '" ' . $selected . '>' . $card->number . '</option>';
            }
            return response()->json($resp);
        }

    }

    public function resetCustom(Request $request)
    {
        if( $request->ajax() ) {

            if ($request->card_id > 0){
                $card = Card::find($request->card_id);
                if (!$card == null) {
                    $card->custom_id = 0;
                    $card->save();
                }
            }

            if ( $request->custom_id > 0 ) {
                $custom = Custom::find($request->custom_id);
                if (!$custom == null) {
                    $custom->card_id = 0;
                    $custom->save();
                }
            }
 
//            $card = \DB::table('cards')
//                ->where('id', '==', $request->card_id)
//                ->get();

            return response()->json('OK');
        }
    }
}
