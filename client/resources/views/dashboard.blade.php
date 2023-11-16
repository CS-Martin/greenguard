@extends('layouts.app')
@section('content')
    <div>
        <x-header />
        <div class="position-relative px-6 py-24">
            <div>
                <x-history-card />

                {{-- Camera floating button --}}
                <div class="fixed sm:w-[450px] text-right bottom-[16%]">
                    <button class="p-6 rounded-full bg-green-600 shadow-2xl" onclick="openCamera()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
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
                            <path d="M2.58337 15.5H28.4167" stroke="white" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>
    </div>
    <x-bottom-nav />
    </div>
    <script>
        function openCamera() {
            navigator.mediaDevices.getUserMedia({
                    video: true
                })
                .then(stream => {
                    // Do something with the camera stream
                })
                .catch(error => {
                    console.error('Error accessing camera:', error);
                });
        }
    </script>
@endsection
