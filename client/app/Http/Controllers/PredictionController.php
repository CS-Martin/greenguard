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

            // Save image to storage
            $imagePath = $image->store('images');

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

        # Get image from storage
        $image = Storage::get($prediction->image_blob);

        return view('prediction-result', [
            'result' => $prediction->result,
            'image' => $image
        ]);
    }

    public function delete(Request $request)
    {
        # Get prediction
        $prediction = $request->user()->predictions()->find($request->route('id'));

        # Delete image from storage
        Storage::delete($prediction->image_blob);

        # Delete prediction from database
        $prediction->delete();

        return back();
    }

    public function deleteAll(Request $request)
    {
        # Get user predictions
        $predictions = $request->user()->predictions()->get();

        # Delete images from storage
        foreach ($predictions as $prediction) {
            Storage::delete($prediction->image_blob);
        }

        # Delete predictions from database
        $request->user()->predictions()->delete();

        return back();
    }
}
