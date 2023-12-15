@extends('layouts.app')
@section('content')
    <div>
        <div class="mb-6">
            <div class="position-relative h-[100%] min-h-screen px-6 py-24">
                <div>
                    <div class="text-center">
                        <p class="font-bold ">{{ $weatherData['location'] }} City</p>
                        <p class=" text-sm text-[#8A8A8A]">{{ $currentDate->format('F j, Y g:i A') }} <br></p>
                    </div>

                    <div class="flex">
                        <div class="w-1/2">
                            <img src="{{ asset('assets/weather/cloudy.png') }}" width="150" class="mx-auto" alt="">
                        </div>
                        <div class="w-1/2 my-auto text-center border-l">
                            <p class="font-bold text-4xl">{{ $weatherData['temperature'][0] }}°C</p>
                            {{-- <p>Feels like 150°C</p> --}}
                        </div>
                    </div>

                    <div class="flex text-center mt-2">
                        <div class="w-1/3">
                            <div class=" shadow-md rounded-md w-24 mx-auto">
                                <div class="flex justify-center ">
                                    <img src="{{ asset('assets/wind.png') }}" width="35" alt="">
                                </div>
                                <p class="mt-1"> {{ $weatherData['wind'][0] }}km/h </p>
                            </div>
                            <p class="py-2 text-[#8A8A8A]">Wind</p>
                        </div>
                        <div class="w-1/3">
                            <div class="shadow-md rounded-md w-24 mx-auto">
                                <div class="flex justify-center">
                                    <img src="{{ asset('assets/cloud.png') }}" width="35" alt="">
                                </div>
                                <p class="mt-1">{{ $weatherData['clouds'][0] }}km/h</p>
                            </div>
                            <p class="py-2 text-[#8A8A8A]">Cloudy</p>
                        </div>
                        <div class="w-1/3">
                            <div class="shadow-md rounded-md w-24 mx-auto">
                                <div class="flex justify-center">
                                    <img src="{{ asset('assets/humidity.png') }}" width="35" alt="">
                                </div>
                                <p class="mt-1">{{ $weatherData['humidity'][0] }}%</p>
                            </div>
                            <p class="py-2 text-[#8A8A8A]">Humidity</p>
                        </div>
                    </div>

                    <div>
                        <x-weather-card :weatherData="$weatherData" />
                    </div>
                </div>

                <div>
                    <div class="pb-[1rem]">
                        <p class="font-bold pb-0">Make Prediction</p>
                        <small class="text-[#8A8A8A]">Insert a photo to predict its disease</small>
                        <form action="{{ route('prediction.post') }}" method="POST" enctype="multipart/form-data"
                            class="flex gap-3">
                            @csrf
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                name="image" id="image" type="file" required>
                            @error('image')
                                <p>{{ $message }}</p>
                            @enderror
                            <button type="submit" class=" bg-green-500 p-2 px-5 text-white rounded-md">Predict</button>

                        </form>
                    </div>

                    <div class="mb-2">
                        <p class="font-bold">{{$predictions->count()}} Recent Detections</p>
                    </div>

                    @if ($predictions->count() <= 0)
                        <div class="bg-gray-100 w-full rounded-lg p-4  text-center">
                            <p class=" text-[#8A8A8A]">No Detection History</p>
                        </div>
                    @endif


                    {{-- Prediction cards --}}
                    @foreach ($predictions as $prediction)
                        <x-history-card :prediction="$prediction" />
                    @endforeach

                    <div class="fixed w-full pr-[10%] sm:pr-[0] sm:w-[450px] text-right bottom-[16%]">
                        <form id="cameraForm" action="{{ route('prediction.post') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <button class=" sm:p-6 p-5 rounded-full bg-green-600 shadow-2xl" id="cameraButton" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31"
                                    fill="none">
                                    <path
                                        d="M12.9167 28.4167C8.04552 28.4167 5.60994 28.4167 4.09665 26.9034C2.58337 25.3902 2.58337 24.2461 2.58337 19.375"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round" />
                                    <path
                                        d="M28.4167 19.375C28.4167 24.2461 28.4167 25.3902 26.9034 26.9034C25.3902 28.4167 22.9545 28.4167 18.0834 28.4167"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round" />
                                    <path
                                        d="M18.0834 2.58331C22.9545 2.58331 25.3902 2.58331 26.9034 4.09659C28.4167 5.60988 28.4167 6.75379 28.4167 11.625"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round" />
                                    <path
                                        d="M12.9167 2.58331C8.04552 2.58331 5.60994 2.58331 4.09665 4.09659C2.58337 5.60988 2.58337 6.75379 2.58337 11.625"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M2.58337 15.5H28.4167" stroke="white" stroke-width="1.5"
                                        stroke-linecap="round" />
                                </svg>
                            </button>
                            <input type="file" id="file" name="image" capture="user" accept="image/*"
                                style="display: none;">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style scoped>
        input#file-upload-button {
            background: #2ca464 !important;
        }
    </style>
    <script>
        document.getElementById('cameraButton').addEventListener('click', function() {
            document.getElementById('file').click();
        });

        document.getElementById('file').addEventListener('change', function() {
            if (this.files && this.files[0]) {
                // Submit the form automatically when the file is chosen
                document.getElementById('cameraForm').submit();

                // Reset the form to clear the input field
                document.getElementById('cameraForm').reset();
            }
        });
    </script>
@endsection
