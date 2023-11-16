@extends('layouts.app')
@section('content')
    <div>
        <div>
            <x-header />
            <div class="position-relative px-6 py-24 h-[100vh]">
                <div class="text-center pb-5 border-b">
                    <img src="{{ asset('assets/dummy_prediction.png') }}" alt="This contains the image predicted"
                        class="max-w-[18rem] mx-auto pb-3">
                    <small class="text-[#8A8A8A]">Disease Prediction:</small>
                    <h1 class=" font-bold text-2xl pt-1">Potato Bacterial Ring Rot</h1>
                </div>

                <div class="text-center">
                    <div class="py-4">
                        <button>
                            <svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                viewBox="0 0 24 24" fill="none">
                                <path d="M12.5 5V19M20 12H5" stroke="#2CA464" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <small>Add to History</small>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <x-bottom-nav />
    </div>
@endsection
