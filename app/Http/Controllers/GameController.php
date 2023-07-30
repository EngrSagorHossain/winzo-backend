<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\GameActions;
use App\Models\ActiveUser;

class GameController extends Controller
{
    public function receivedData(Request $request)
    {
        if ($request->action == 'user_joined') {
            ActiveUser::create($request->all());
        }
        if ($request->action == 'user_leave') {
            ActiveUser::where('uid', $request->uid)->delete();
        }

        return response()->json($request->all());
    }
}
