@extends('layouts.app')

@section('content')
    <div class="px-6  flex items-center justify-center h-screen">
        <div class="w-full">
            <img src="{{ asset('assets/greengard_icon.svg') }}" alt="" class="mx-auto" width="200">
            <img src="{{ asset('assets/greengard_logo.png') }}" alt="" class="mx-auto my-5" width="100">

            <form class="w-full" method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="w-full mb-6">
                    <div class="relative">
                        <input type="text" id="email" name="email"
                            class="block py-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="email"
                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-[#FDFDFD] dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Email</label>
                    </div>
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full mb-4">
                    <div class="w-full mb-4 relative">
                        <input type="password" id="password" name="password"
                            class="block py-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="password"
                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Password</label>

                        <div id="tooltip-left" role="tooltip"
                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Show Password
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <button type="button" id="togglePasswordButton" data-tooltip-target="tooltip-left" data-tooltip-placement="left"
                            data-bs-title="Tooltip on top" class="absolute right-4 top-1/2 transform -translate-y-1/2">
                            <!-- Initial SVG for hiding password -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="#168a5f" class="w-6 h-6" id="hidePasswordSvg">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>

                            <!-- SVG for showing password -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="#D30000" class="w-6 h-6" id="showPasswordSvg" style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit"
                    class="text-white bg-[#1CB87E] hover:bg-[#168a5f] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-4 text-center mb-3">Sign
                    In
                </button>
                <div class="flex flex-row gap-x-2">
                    <p>Don't have an account?</p>
                    <a href="{{ route('register') }}" class="text-[#1CB87E]">Create an account</a>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var passwordInput = document.getElementById('password');
            var togglePasswordButton = document.getElementById('togglePasswordButton');
            var hidePasswordSvg = document.getElementById('hidePasswordSvg');
            var showPasswordSvg = document.getElementById('showPasswordSvg');
            togglePasswordButton.addEventListener('click', function() {
                var type = passwordInput.type === 'password' ? 'text' : 'password';
                passwordInput.type = type;

                hidePasswordSvg.style.display = type === 'password' ? 'block' : 'none';
                showPasswordSvg.style.display = type === 'password' ? 'none' : 'block';
            });
        });
    </script>
@endsection
