<div class="fixed top-0 sm:w-[500px] px-6 flex bg-white items-center justify-between h-[65px] w-full mx-auto border-b mb-6 z-20">
    <div class="flex gap-x-3 font-bold">
        @if (request()->is('history') || request()->is('prediction/*') || request()->is('chatbot') || request()->is('profile') || request()->is('chat'))
            <a href="{{ url()->previous() }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M20 12H4M4 12L10 6M4 12L10 18" stroke="#3D3D3D" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </a>
        @endif

        @if (request()->is('dashboard'))
            <img src="{{ asset('assets/greengard_logo.png') }}" width="100" alt="">
        @elseif (request()->is('history'))
            <p>History</p>
        @elseif (request()->is('prediction-result'))
            <p>Prediction</p>
        @elseif (request()->is('chatbot'))
            <p>Chatbot</p>
        @elseif (request()->is('prediction/*'))
            <p>Prediction</p>
        @elseif (request()->is('profile'))
            <p>Profile</p>
        @elseif (request()->is('chat'))
            <p>Chat</p>
        @endif
    </div>

    <div>
        @if (request()->is('history'))
            <div class="flex justify-end">
                <form action="{{ route('prediction.delete.all') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Delete All</button>
                </form>
            </div>
        @endif
    </div>

    @if (!request()->is('history'))
    <a href="/profile">
        <button class="text-gray-600  {{ request()->is('profile') ? 'active' : '' }}">
            <img src="{{ asset('assets/greengard_icon.svg') }}" width="30" height="30" class=" border border-green-600 rounded-full" alt="">
        </button>
    </a>
    @endif
</div>

<style>
    .search-container {
        position: relative;
        width: 50px;
        transition: width 0.4s ease-in-out;
    }

    .search-input {
        width: 100%;
        padding: 8px;
        border: none;
        border-radius: 5px;
        outline: none;
        opacity: 0;
        transition: opacity 0.4s ease-in-out;
    }

    .search-input:focus {
        opacity: 1;
    }

    .search-icon {
        position: absolute;
        top: 0;
        right: 0;
        padding: 8px;
        cursor: pointer;
    }

    .search-container:focus-within {
        width: 200px;
    }
</style>
