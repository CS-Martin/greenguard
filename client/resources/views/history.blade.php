@extends('layouts.app')
@section('content')
    <div>
        <div>
            <x-header />
            <div class="position-relative px-6 py-24">
                <div>
                    <x-history-card />
                </div>
            </div>
        </div>
        <x-bottom-nav />
    </div>
@endsection