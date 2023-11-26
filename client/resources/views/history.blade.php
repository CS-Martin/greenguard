@extends('layouts.app')
@section('content')
    <div>
        <div>
            <div class="position-relative h-[100%] px-6 pb-30 py-24">
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
    </div>
@endsection
