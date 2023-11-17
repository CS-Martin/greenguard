<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\Prediction;

class PredictionController extends Controller
{
    public function predict(Request $request)
    {
        $image = $request->file('image');

        # Convert image to base64
        $imageBase64 = base64_encode(file_get_contents($image));

        # Send request to API
        $response = Http::post('http://localhost:3000/api/predict', [
            'image_base64' => $imageBase64
        ]);

        if ($response->successful()) {
            $result = $response->json();

            // TO DO: Save image to storage
            // Save image to storage
            // $image->store('storage/images/', $image->getClientOriginalName());

            // Get image path
            // $imagePath = 'storage/images/' . $image->getClientOriginalName();
            $imagePath = 'Not working!';

            # Save prediction to database
            $request->user()->predictions()->create([
                'image_blob' => $imagePath,
                'result' => $result['prediction']
            ]);

            # Get prediction id
            $predictionId = $request->user()->predictions()->latest()->first()->id;

            return redirect()->route('prediction', ['id' => $predictionId]);
        } else {
            return back()->with('error', 'Something went wrong.');
        }
    }

    public function show($id)
    {
        # Get prediction
        $prediction = Prediction::find($id);

        return view('prediction-result', [
            'result' => $prediction->result,
            'imageBase64' => $prediction->image_blob
        ]);
    }
}
