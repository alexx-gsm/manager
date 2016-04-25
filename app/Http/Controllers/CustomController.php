<?php

namespace App\Http\Controllers;

use App\Card;
use App\Object;
use DB;
use App\Custom;
use Illuminate\Http\Request;

use App\Http\Requests;

class CustomController extends Controller
{
    public function getAll()
    {
        $customs = DB::table('customs')
            ->select('*')
            ->where('pid', '==', 0)
            ->get();

        $cards = Card::all();
        $cards_list = [];
        foreach ($cards as $card) {
            $cards_list[$card->id] = $card->number . ': ' . $card->type;
        }
        
        return view('customs.customs', ['customs' => $customs, 'cards' => $cards_list, 'title' => 'Клиенты']);
    }

    public function getOne($id = null)
    {
        $custom = Custom::find($id);

        $cardNumber = $this->getCardNumber($custom->card_id);

        $orders = DB::table('orders')
            ->where('custom_id', '=', $custom->id)
            ->get();

        $objects = Object::all();
        $obj_list = [];
        foreach ($objects as $object) {
            $obj_list[$object->id] = 
                $object->name . ': ' . 
                $object->city . ', ' . 
                $object->street . ' ' .
                $object->building . '-' .
                $object->flat;
        }

        return view('customs.custom', [
            'custom'        => $custom,
            'cardNumber'    => $cardNumber,
            'orders'        => $orders,
            'countOrders'   => count($orders),
            'objects'       => $obj_list,
            'title'         => 'Клиент'
        ]);
    }

    public function save(Request $request)
    {
        $custom = isset($request->id) ? Custom::find($request->id) : (new Custom());

        $custom->name_last = $request->name_last;
        $custom->name_first = $request->name_first;
        $custom->name_middle = $request->name_middle ?: '';

        $custom->phone = $request->phone;
        $custom->email = $request->email;

        $custom->card_id = $request->card_id ?: '';

        $custom->save();

        if (!$custom->card_id == null) {
            $card = Card::find($custom->card_id);
            $card->custom_id = $custom->id;
            $card->save();
        }

        $orders = DB::table('orders')
            ->where('custom_id', '=', $custom->id)
            ->get();

        $objects = Object::all();
        $obj_list = [];
        foreach ($objects as $object) {
            $obj_list[$object->id] =
                $object->name . ': ' .
                $object->city . ', ' .
                $object->street . ' ' .
                $object->building . '-' .
                $object->flat;
        }

        $cardNumber = $this->getCardNumber($custom->card_id);

        return view('customs.custom', [
            'custom' => $custom,
            'cardNumber' => $cardNumber,
            'orders'        => $orders,
            'countOrders'   => count($orders),
            'objects'       => $obj_list,
            'title' => 'Клиент']);
    }

    protected function getCardNumber( $card_id = null )
    {
        if (!$card_id == null) {
            $card = Card::find($card_id);
            return $card->number ?? '';
        } else {
            return '';
        }
    }
}
