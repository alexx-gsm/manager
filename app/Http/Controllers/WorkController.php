<?php

namespace App\Http\Controllers;

use App\Actions;
use App\Orders;
use App\Work;
use Illuminate\Http\Request;
use App\Http\Requests;

class WorkController extends Controller
{
    public function saveWork(Request $request)
    {
        if( $request->ajax() ) {

            $work = new Work();
            $work->order_id = $request->order_id;
            $work->action_id = $request->action_id;
            $work->count = $request->count;
            $work->value = $request->value;
            $work->total = $work->count * $work->value;
            $work->save();

            $works = Work::getSorted($work->order_id);
            
            $actions = Actions::all();
            $action_list = [];
            foreach ($actions as $action)  {
                $action_list[$action->id] = $action->name;
            }

            $total = 0;
            $select = '';
            foreach ($works as $work){
                $select .= '<tr>';
                $select .= '<td width="60%">' . $action_list[$work->action_id] . '</td>';
                $select .= '<td width="15%">' . $work->value . '</td>';
                $select .= '<td width="10%">' . $work->count . '</td>';
                $select .= '<td width="15%">' . $work->total . '</td>';
                $select .= '<td><button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>';
                $select .= '</tr>';
                $total += (int)$work->total;
            }

            $select .= '<tr class="no-point bold"><td></td><td></td><td>Итого:</td><td>' . $total .'</td>';
            $select .= '<td><button id="btn-add" type="button" class="btn btn-success btn-xs" onclick="addWorks()"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button></td>';
            $select .= '</tr>';

            $order = Orders::find($work->order_id);
            $order->total_value = $total;
            $order->save();
                        
            return response()->json([
                'select' => $select,
                'total'  => $total,
            ]);
        }
    }


}
