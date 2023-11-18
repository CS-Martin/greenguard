<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prediction;

class DashboardController extends Controller
{
    public function show(Request $request)
    {
        # Get 5 latest user predictions
        $predictions = $request->user()->predictions()->latest()->take(5)->get();

        return view('dashboard', [
            'predictions' => $predictions
        ]);
    }
}
