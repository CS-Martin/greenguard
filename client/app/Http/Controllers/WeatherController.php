<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Stevebauman\Location\Facades\Location;

class WeatherController extends Controller
{   
    public function convertWeatherCode($code)
    {
        $dictionary = [
            0 => 'Clear Sky',
            1 => 'Mainly Clear, Partly Cloudy, and Overcast',
            2 => 'Mainly Clear, Partly Cloudy, and Overcast',
            3 => 'Mainly Clear, Partly Cloudy, and Overcast',
            45 => 'Fog and depositing rime fog',
            48 => 'Fog and depositing rime fog',
            51 => 'Drizzle: Light, moderate, and dense intensity',
            53 => 'Drizzle: Light, moderate, and dense intensity',
            55 => 'Drizzle: Light, moderate, and dense intensity',
            56 => 'Freezing Drizzle: Light and dense intensity',
            57 => 'Freezing Drizzle: Light and dense intensity',
            61 => 'Rain: Slight, moderate and heavy intensity',
            63 => 'Rain: Slight, moderate and heavy intensity',
            65 => 'Rain: Slight, moderate and heavy intensity',
            66 => 'Freezing Rain: Light and heavy intensity',
            67 => 'Freezing Rain: Light and heavy intensity',
            71 => 'Snow fall: Slight, moderate, and heavy intensity',
            73 => 'Snow fall: Slight, moderate, and heavy intensity',
            75 => 'Snow fall: Slight, moderate, and heavy intensity',
            77 => 'Snow grains',
            80 => 'Rain showers: Slight, moderate, and violent',
            81 => 'Rain showers: Slight, moderate, and violent',
            82 => 'Rain showers: Slight, moderate, and violent',
            85 => 'Snow showers slight and heavy',
            86 => 'Snow showers slight and heavy',
            95 => 'Thunderstorm: Slight or moderate',
            96 => 'Thunderstorm with slight and heavy hail',
            99 => 'Thunderstorm with slight and heavy hail',
        ];
        $codeDescription = array();
        foreach($code as $i){
            $codeDescription[] = $dictionary[$i]; 
        }
        return $codeDescription;
    }

    public function getLocation(float $latitude, float $longitude)
    {
        $response = Http::get("https://api.bigdatacloud.net/data/reverse-geocode-client?latitude={$latitude}&longitude={$longitude}");
        
        if ($response->failed()){
            return str("Failed to retrieve name of current location");
        }
        $responseData = $response->json();
        $city = $responseData['city'];

        return $city;
    }

    public function getWeather()
    {
        $days = 1; 
        //$ip = '49.35.41.195'; //For static IP address get
        $ip = request()->ip(); //Dynamic IP address get
        $data = Location::get($ip); 

        if($data == false){ //If location can't be taken from IP, defaults to Naga City Hall
            $longitude = 123.198;
            $latitude = 13.626;  
        } 
        else{
            $longitude = $data->longitude;
            $latitude = $data->latitude;
        }

        $response = Http::get('https://api.open-meteo.com/v1/forecast', [
            'latitude' => $latitude,
            'longitude' => $longitude,
            'forecast_days' => $days,
            'hourly' => ["weather_code", "temperature_2m", "wind_speed_10m", "relative_humidity_2m", "cloud_cover"],
        ]);
        if ($response->failed()){
            return str("Failed to retrieve weather data");
        }
        $responseData = $response->json();
        // return dd($responseData['hourly']['weather_code']);

        $location = WeatherController::getLocation($latitude, $longitude);
        $temperature = $responseData['hourly']['temperature_2m'];
        $humidity = $responseData['hourly']['relative_humidity_2m'];
        $weather = WeatherController::convertWeatherCode($responseData['hourly']['weather_code']);
        $clouds = $responseData['hourly']['cloud_cover'];

        return (
            compact(
                'location', 
                'temperature',  
                'humidity', 
                'weather',
                'clouds'
            )
        );
    }
}
