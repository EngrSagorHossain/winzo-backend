<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GreedyController extends Controller
{
    public function receivedData(Request $request)

    {
          if ($request->action == 'user_list') {
            $data = ActiveUser::all();
            broadcast(new GameUsers($data));
        }

        if ($request->action == 'user_joined') {
            ActiveUser::create($request->all());
            $data = ActiveUser::all();
            broadcast(new GameActions($request->all()));
            broadcast(new GameUsers($data));

        }
        if ($request->action == 'user_leave') {
            ActiveUser::where('uid', $request->uid)->delete();
            $data = ActiveUser::all();
            broadcast(new GameActions($request->all()));
            broadcast(new GameUsers($data));
        }
        if ($request->action == 'bet') {
            Bet::create($request->all());

            $betsWithType1 = Bet::where('bet_type', '=', '1')->get();
            $totalAmount1 = $betsWithType1->sum('amount');

            $betsWithType2 = Bet::where('bet_type', '=', '2')->get();
            $totalAmount2 = $betsWithType2->sum('amount');

            $betsWithType3 = Bet::where('bet_type', '=', '3')->get();
            $totalAmount3 = $betsWithType3->sum('amount');
            $data = [
                'action' => 'total',
                'totalAmount1' => $totalAmount1,
                'totalAmount2' => $totalAmount2,
                'totalAmount3' => $totalAmount3,
            ];

            broadcast(new GameActions($data));
            // Return the response as an associative array

        }

        if ($request->action == 'delete') {
            Bet::truncate();
            $data = [
                'action' => 'total',
                'totalAmount1' => 0,
                'totalAmount2' => 0,
                'totalAmount3' => 0,
            ];

            broadcast(new GameActions($data));
        }


        return response()->json('success');

    }
}
