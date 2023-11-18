@extends('layouts.app')
@section('content')
    <div>
        <div>
            <x-header />
            <div class="position-relative h-screen px-6 py-24">
                <div>
                    @forelse ($predictions as $prediction)
                        <x-history-card :prediction="$prediction" />
                    @empty
                        <div class="bg-gray-100 w-full rounded-lg p-4  text-center">
                            <p class=" text-[#8A8A8A]">No Detection History</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <x-bottom-nav />
    </div>
@endsection
