<div class="fixed bottom-0 sm:w-[500px] w-full p-4 bg-white text-white border border-t mx-auto justify-center">
    <div class=" flex flex-row items-center justify-evenly gap-x-44 py-2">
        <a href="/">
            <button class="text-gray-600 ">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <path
                        d="M13.9931 3.19949L13.9934 3.19968L19.7533 7.22961C19.7533 7.22964 19.7533 7.22966 19.7534 7.22968C20.2226 7.55815 20.6668 8.09671 20.9943 8.72389C21.3217 9.35111 21.51 10.0243 21.51 10.6V17.38C21.51 19.6539 19.6638 21.5 17.39 21.5H6.60999C4.33754 21.5 2.48999 19.6453 2.48999 17.37V10.47C2.48999 9.93556 2.66038 9.29648 2.95857 8.69086C3.25662 8.08551 3.66106 7.55688 4.08751 7.22425L4.08761 7.22417L9.09624 3.31524C9.09645 3.31507 9.09667 3.3149 9.09689 3.31473C10.4337 2.27943 12.6028 2.22541 13.9931 3.19949ZM12 19.25C12.6861 19.25 13.25 18.6861 13.25 18V15C13.25 14.3139 12.6861 13.75 12 13.75C11.3138 13.75 10.75 14.3139 10.75 15V18C10.75 18.6861 11.3138 19.25 12 19.25Z"
                        stroke="#3D3D3D" />
                </svg>
                <small>Home</small>
            </button>
        </a>

        {{-- Camera button --}}
        <a href="" style="position: absolute; left: 50%; transform: translateX(-50%) translateY(-50%); ">
            <button class="p-6 rounded-full bg-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31"
                    fill="none">
                    <path
                        d="M12.9167 28.4167C8.04552 28.4167 5.60994 28.4167 4.09665 26.9034C2.58337 25.3902 2.58337 24.2461 2.58337 19.375"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" />
                    <path
                        d="M28.4167 19.375C28.4167 24.2461 28.4167 25.3902 26.9034 26.9034C25.3902 28.4167 22.9545 28.4167 18.0834 28.4167"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" />
                    <path
                        d="M18.0834 2.58331C22.9545 2.58331 25.3902 2.58331 26.9034 4.09659C28.4167 5.60988 28.4167 6.75379 28.4167 11.625"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" />
                    <path
                        d="M12.9167 2.58331C8.04552 2.58331 5.60994 2.58331 4.09665 4.09659C2.58337 5.60988 2.58337 6.75379 2.58337 11.625"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" />
                    <path d="M2.58337 15.5H28.4167" stroke="white" stroke-width="1.5" stroke-linecap="round" />
                </svg>
            </button>
        </a>
        {{-- end of camera button --}}

        <a href="">
            <button class="text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto" width="24" height="24"
                    viewBox="0 0 24 24" fill="none">
                    <path
                        d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                        stroke="#3D3D3D" />
                    <path d="M12 8V12L14.5 14.5" stroke="#3D3D3D" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <small>History</small>
            </button>
        </a>
    </div>
</div>
