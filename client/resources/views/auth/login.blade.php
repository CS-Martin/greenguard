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
                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Email</label>
                    </div>
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full mb-4">
                    <div class="relative">
                        <input type="password" id="password" name="password"
                            class="block py-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="password"
                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Password</label>
                    </div>
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-start mb-4">
                    <div class="flex items-center h-5">
                        <input id="remember" type="checkbox" value=""
                            class="accent-pink-500 w-4 h-4 border border-gray-300 rounded focus:ring-3 focus:ring-blue-300">
                    </div>
                    <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember
                        me</label>
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
@endsection
