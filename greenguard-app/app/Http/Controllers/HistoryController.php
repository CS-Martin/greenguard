<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prediction;

class HistoryController extends Controller
{
    public function show(Request $request)
    {
        # Get user predictions
        $predictions = $request->user()->predictions()->latest()->get();

        return view('history', [
            'predictions' => $predictions
        ]);
    }
}
