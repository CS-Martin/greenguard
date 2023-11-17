<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PredictionController extends Controller
{
    public function predict(Request $request)
    {
        $image = $request->file('image');

        // Pwede i-encode yung image to base64
        $imageBase64 = base64_encode(file_get_contents($image));

        // POST request to FastAPI
        $response = Http::post('http://localhost:3000/api/predict', [
            'image_base64' => $imageBase64
        ]);

        if ($response->successful()) {
            $result = $response->json();
            $imageBase64 = base64_encode(file_get_contents($request->file('image')));
            return view('prediction-result', [
                'result' => $result,
                'imageBase64' => $imageBase64
            ]);
        } else {
            return back()->with('error', 'Sorry mayong laman AHAHAHA');
        }
    }
}
