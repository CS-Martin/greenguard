<?php

namespace App\View\Components;

use Carbon\Carbon;
use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class WeatherCard extends Component
{
    /**
     * The temperature value.
     *
     * @var int
     */
    public $weatherData;
    public $currentTime;

    /**
     * Create a new component instance.
     */
    public function __construct($weatherData)
    {
        $this->weatherData = $weatherData;
        $this->currentTime = Carbon::now();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.weather-card');
    }
}
