<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Events\GreedyActions;
use App\Models\WinnerList;

class GreedyController extends Controller
{
    public function receivedData(Request $request)


    {
          if ($request->action == 'winner_list') {
            $data = WinnerList::orderBy('win_amount', 'desc')
            ->take(3)
            ->get();
            broadcast(new GreedyActions($data,'winnerlist'));
            return response()->json($data);

        }
        if ($request->action == 'remove_winner') {
            WinnerList::truncate();
            return response()->json('removed');
        }

        if ($request->action == 'add_winner') {
            WinnerList::create($request->all());
            return response()->json('success');
        }


    }
    //add round
    public function addRound()
    {

        $todaysRound = Cache::get('todaysRound', 0);
        $todaysRound++;
        broadcast(new GreedyActions($todaysRound,'rounds'));
        Cache::put('todaysRound', $todaysRound, now()->endOfDay());
        return response()->json(['message' => 'Round added successfully']);
    }

}
