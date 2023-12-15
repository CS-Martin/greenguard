@extends('layouts.app')
@section('content')
    <div id="splash-screen" class="w-full flex items-center justify-center h-screen">
        <div class=" pb-60">
            <img src="{{ asset('assets/greengard_icon.svg') }}" alt="" class="mx-auto" width="200">
            <img src="{{ asset('assets/greengard_logo.png') }}" alt="" class="mx-auto my-5" width="100">
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#splash-screen').fadeIn().delay(1000).fadeOut(function() {
                window.location = '/dashboard'; // Replace with your destination URL
            });
        });
    </script>
@endsection
