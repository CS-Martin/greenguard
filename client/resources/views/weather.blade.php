@extends('dashboard')

@section('weather')
    <div class="">
        <h1>Weather Report for {{ $location }}</h1>

        <p>Temperature:</p>
        <ul>
            @foreach ($temperature as $temp)
                <li>{{ $temp }} °C</li>
            @endforeach
        </ul>

        <p>Humidity:</p>
        <ul>
            @foreach ($humidity as $humid)
                <li>{{ $humid }}%</li>
            @endforeach
        </ul>

        <h2>Hourly Weather Forecast:</h2>
        <ul>
            @foreach ($weather as $hourly)
                <li>{{ $hourly }}</li>
            @endforeach
        </ul>

        <p>Cloud Cover:</p>
        <ul>
            @foreach ($clouds as $cloud)
                <li>{{ $cloud }}%</li>
            @endforeach
        </ul>
    </div>
@endsection
