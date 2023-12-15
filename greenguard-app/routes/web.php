<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\WeatherController;

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


Route::view('/', 'splash')->name('splash');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');

// Private routes
Route::middleware(['auth'])->group(function () {
    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');

    // History
    Route::get('/history', [HistoryController::class, 'show'])->name('history');

    // Chatbot
    Route::get('/chat', [ChatController::class, 'show'])->name('chat');

    // Profile
    Route::get('/profile', function () {
        return view('profile');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Prediction
    Route::post('/prediction', [PredictionController::class, 'predict'])->name('prediction.post');
    // Add middleware to protect this route from unauthorized access
    Route::get('/prediction/{id}', [PredictionController::class, 'show'])->name('prediction')->middleware('authorize');
    Route::delete('/prediction/{id}', [PredictionController::class, 'delete'])->name('prediction.delete');
    Route::delete('/prediction', [PredictionController::class, 'deleteAll'])->name('prediction.delete.all');

    // Weather
    // Route::get('/dashboard', [WeatherController::class, 'getWeather'])->name('getWeather');
    Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard.show');
});
