<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Weather extends Component
{
    public $weatherData;
    public function __construct($weatherData)
    {
        $this->weatherData = $weatherData;
    }

    public function render(): View|Closure|string
    {
        return view('components.weather');
    }
}
