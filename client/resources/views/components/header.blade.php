<div class="fixed sm:w-[500px] px-6 flex bg-white items-center justify-between h-[65px] w-full border-b mb-6">
    <div class="flex gap-x-3 font-bold">
        @if (request()->is('history') || request()->is('prediction/*') || request()->is('chatbot') || request()->is('profile'))
            <a href="{{ url()->previous() }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M20 12H4M4 12L10 6M4 12L10 18" stroke="#3D3D3D" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </a>
        @endif

        @if (request()->is('/'))
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
        @endif
    </div>

    {{-- <div class="search-container ">
        <input type="text" id="search-input" class="search-input" placeholder="Search...">
        <label for="search-input" class="search-icon ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
        </label>
    </div> --}}
    <div>
        <a href="/profile" >
            <button class="text-gray-600  {{ request()->is('profile') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                    stroke="currentColor" class="w-9 h-9 mt-1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </button>
        </a>
    </div>
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

<script>
    const sidedBarToggle = document.getElementById('sidebar-toggle');

    sidedBarToggle.addEventListener('click', () => {
        const sidebar = document.getElementById('default-sidebar');
        sidebar.classList.toggle('');
    });
</script>
