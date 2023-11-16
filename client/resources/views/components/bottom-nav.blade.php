<div class="fixed  bottom-0 sm:w-[500px] w-full p-4 bg-white text-white  border-t mx-auto justify-center">
    <div class=" flex flex-row items-center justify-evenly gap-x-16 py-2">
        <a href="/">
            <button class="text-gray-600 {{ request()->is('/') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <path class=" {{ request()->is('/') ? 'active' : '' }}"
                        d="M13.9931 3.19949L13.9934 3.19968L19.7533 7.22961C19.7533 7.22964 19.7533 7.22966 19.7534 7.22968C20.2226 7.55815 20.6668 8.09671 20.9943 8.72389C21.3217 9.35111 21.51 10.0243 21.51 10.6V17.38C21.51 19.6539 19.6638 21.5 17.39 21.5H6.60999C4.33754 21.5 2.48999 19.6453 2.48999 17.37V10.47C2.48999 9.93556 2.66038 9.29648 2.95857 8.69086C3.25662 8.08551 3.66106 7.55688 4.08751 7.22425L4.08761 7.22417L9.09624 3.31524C9.09645 3.31507 9.09667 3.3149 9.09689 3.31473C10.4337 2.27943 12.6028 2.22541 13.9931 3.19949ZM12 19.25C12.6861 19.25 13.25 18.6861 13.25 18V15C13.25 14.3139 12.6861 13.75 12 13.75C11.3138 13.75 10.75 14.3139 10.75 15V18C10.75 18.6861 11.3138 19.25 12 19.25Z"
                        stroke="#3D3D3D" />
                </svg>
                <small>Home</small>
            </button>
        </a>

        <a href="/chatbot">
            <button class="text-gray-600  {{ request()->is('/chatbot') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto" width="24" height="24"
                    viewBox="0 0 21 21" fill="none">
                    <path class=" {{ request()->is('/chatbot') ? 'active' : '' }}"
                        d="M10 17.25C14.97 17.25 19 13.556 19 9C19 4.444 14.97 0.75 10 0.75C5.03 0.75 1 4.444 1 9C1 11.104 1.859 13.023 3.273 14.48C3.705 14.927 4.013 15.52 3.859 16.121C3.69037 16.7782 3.37478 17.3885 2.936 17.906C3.28714 17.9691 3.64324 18.0005 4 18C5.282 18 6.47 17.598 7.445 16.913C8.255 17.133 9.113 17.25 10 17.25Z"
                        stroke="#3D3D3D" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <small>Chatbot</small>
            </button>
        </a>

        <a href="/history">
            <button class="text-gray-600  {{ request()->is('history') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto" width="24" height="24"
                    viewBox="0 0 24 24" fill="none">
                    <path class="{{ request()->is('history') ? 'active' : '' }}"
                        d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                        stroke="#3D3D3D" />
                    <path class="{{ request()->is('history') ? 'active' : '' }}" d="M12 8V12L14.5 14.5" stroke="#3D3D3D"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <small>History</small>
            </button>
        </a>
    </div>
</div>

<style scoped>
    .active {
        color: #197243;
        stroke: #197243;
    }
</style>
