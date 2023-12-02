<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function show(Request $request)
    {
        # Get 5 latest user predictions
        $predictions = $request->user()->predictions()->latest()->take(5)->get();
        $weatherData = (new WeatherController())->getWeather();
        $currentDate = Carbon::now();

        // return dd(['weatherData' => $weatherData],
        //     ['predictions' => $predictions]);
        return view('dashboard', [
            'predictions' => $predictions,
            'weatherData' => $weatherData,
            'currentDate' => $currentDate,
        ]);
    }
}
