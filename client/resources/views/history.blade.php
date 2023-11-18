@extends('layouts.app')
@section('content')
    <div>
        <div>
            <x-header />
            <div class="position-relative h-screen px-6 py-24">
                <div>
                    @foreach ($predictions as $prediction)
                        <x-history-card :prediction="$prediction" />
                    @endforeach
                </div>
            </div>
        </div>
        <x-bottom-nav />
    </div>
@endsection
