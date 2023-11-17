<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PredictionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/history', function () {
    return view('history');
});

Route::get('/chatbot', function () {
    return view('chatbot');
});

// Route::get('/predict', function () {
//     return view('predict');
// });

Route::post('/prediction-result', [PredictionController::class, 'predict'])->name('prediction-result');
