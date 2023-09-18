<?php

namespace App\Http\Controllers;
use App\Models\WinLoss;
use Illuminate\Http\Request;

class WinLossController extends Controller
{
    // List all win_losses
    public function listOfWinLoss()
    {
        $winLosses = WinLoss::all();
        return response()->json($winLosses);
    }

    // Add a new win_loss
    public function WinLoss(Request $request)
    {
        $data = $request->validate([
            'field1' => 'required|string',
            'field2' => 'required|string',
            'field3' => 'required|string',
        ]);

        $winLoss = WinLoss::create($data);

        return response()->json($winLoss, 201); // Return the newly created record with a status code of 201 (Created).
    }
}
