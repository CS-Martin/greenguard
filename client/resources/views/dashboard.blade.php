@extends('layouts.app')
@section('content')
    <div>
        <x-header />
        <div class="position-relative h-screen px-6 py-24">
            <div>
                <div class="pb-[1rem]">
                    <p class="font-bold pb-0">Make Prediction</p>
                    <small class="text-[#8A8A8A]">Insert a photo to predict its disease</small>
                    <form action="{{ route('prediction.post') }}" method="POST" enctype="multipart/form-data"
                        class="flex gap-3">
                        @csrf
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            name="image" id="image" type="file" required>
                        @error('image')
                            <p>{{ $message }}</p>
                        @enderror
                        <button type="submit" class=" bg-green-500 p-2 px-5 text-white rounded-md">Predict</button>

                    </form>
                </div>

                <div class="mb-2">
                    <p class="font-bold">Detection History</p>
                </div>

                @if ($predictions->count() <= 0)
                    <div class="bg-gray-100 w-full rounded-lg p-4  text-center">
                        <p class=" text-[#8A8A8A]">No Detection History</p>
                    </div>
                @endif


                {{-- Prediction cards --}}
                @foreach ($predictions as $prediction)
                    <x-history-card :prediction="$prediction" />
                @endforeach

                <div class="fixed sm:w-[450px] text-right bottom-[16%]">
                    <form id="cameraForm" action="{{ route('prediction.post') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <button class="p-6 rounded-full bg-green-600 shadow-2xl" id="cameraButton" type="button">
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
                        <input type="file" id="file" name="image" capture="user" accept="image/*"
                            style="display: none;">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <x-bottom-nav />
</div>

    <style scoped>
        input#file-upload-button {
            background: #2ca464 !important;
        }
    </style>
    <script>
        // document.getElementById('cameraButton').addEventListener('click', function() {
        //     document.getElementById('fileInput').click();
        // });
        document.getElementById('cameraButton').addEventListener('click', function() {
            document.getElementById('file').click();
        });

        document.getElementById('file').addEventListener('change', function() {
            if (this.files && this.files[0]) {
                // Submit the form automatically when the file is chosen
                document.getElementById('cameraForm').submit();
            }
        });
    </script>
@endsection
