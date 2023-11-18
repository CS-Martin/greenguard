<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\AuthController;

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

// Public routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');

// Private routes
Route::middleware(['auth'])->group(function () {
    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/', function () {
        return view('dashboard');
    });

    // History
    Route::get('/history', function () {
        return view('history');
    });

    // Chatbot
    Route::get('/chatbot', function () {
        return view('chatbot');
    });

    // Profile
    Route::get('/profile', function () {
        return view('profile');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Prediction
    Route::post('/prediction', [PredictionController::class, 'predict'])->name('prediction.post');
    // Add middleware to protect this route from unauthorized access
    Route::get('/prediction/{id}', [PredictionController::class, 'show'])->name('prediction')->middleware('authorize');
});
