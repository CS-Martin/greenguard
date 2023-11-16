<div class="fixed sm:w-[500px] px-6 flex bg-white items-center justify-between h-[65px] w-full border-b mb-6">
    <div class="flex gap-x-3 font-bold">
        @if (request()->is('history') || request()->is('prediction/*'))
            <a href="{{ url()->previous() }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M20 12H4M4 12L10 6M4 12L10 18" stroke="#3D3D3D" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </a>
        @endif

        @if (request()->is('/'))
            <p>Dashboard</p>
        @elseif (request()->is('history'))
            <p>History</p>
        @elseif (request()->is('prediction/*'))
            <p>Prediction</p>
        @endif
    </div>
</div>
