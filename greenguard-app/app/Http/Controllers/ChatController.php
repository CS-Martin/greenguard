<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ChatController extends Controller
{
    public function show()
    {
        return view('chat');
    }

    // public function send(Request $request)
    // {
    //     $message = $request->input('message');

    //     // Create a stream response
    //     $response = new StreamedResponse(function () use ($message) {
    //         // Make the API call and get the stream
    //         $stream = Http::post('http://localhost:11434/api/generate', [
    //             'model' => 'orca-mini',
    //             'prompt' => $message
    //         ])->getBody()->detach();

    //         // Output the stream directly to the response
    //         fpassthru($stream);

    //         // Close the stream to release the resources
    //         fclose($stream);
    //     });

    //     // Set the content type of the response
    //     $response->headers->set('Content-Type', 'application/octet-stream');

    //     // Optionally, set other headers as needed

    //     // Return the streaming response
    //     return $response;
    // }
    
    // public function send(Request $request)
    // {
    //     $message = $request->input('message');

    //     // Create a stream response
    //     return response()->stream(function () use ($message) {
    //         // Make the API call and get the stream
    //         $stream = Http::post('http://localhost:11434/api/generate', [
    //             'model' => 'orca-mini',
    //             'prompt' => $message
    //         ])->getBody()->detach();
            
    //         // Output the stream directly to the response
    //         fpassthru($stream);

    //         // Close the stream to release the resources
    //         fclose($stream);
    //         }, 200, [
    //         'Content-Type' => 'application/octet-stream'
    //     ]);
    // }

}
