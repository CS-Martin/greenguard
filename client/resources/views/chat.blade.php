@extends('layouts.app')

@section('content')
    <div>
        <x-header />
        <div>
            <div class="position-relative px-6 py-24 h-[100vh]" id="chat-container">
                <div>
                    <div
                        class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-green-500 rounded-full dark:bg-green-600">
                        <span class="font-medium text-white dark:text-gray-300">GG</span>
                    </div>
                    <div class="relative">
                        <span
                            class="bottom-0 left-7 absolute  w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-white rounded-full"></span>
                    </div>
                </div>
            </div>

            <div class="flex flex-row fixed bottom-[10%] sm:w-[500px] w-full p-4 bg-white text-white border-t gap-x-4">
                <div class="relative basis-96">
                    <input type="text" id="message" name="message"
                        class="block px-2.5 pb-2.5 pt-4 w-[100%] text-sm text-black bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-green-400 focus:outline-none focus:ring-0 focus:border-green-400 peer"
                        placeholder=" " />
                    <label for="message"
                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-[#FDFDFD] dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-green-400 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Send
                        a message...</label>
                </div>
                <div class="basis-20 flex gap-x-1 my-auto bg-green-400 p-3 rounded-lg">
                    <button id="submitBtn" class="mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                            stroke="white" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <x-bottom-nav />
    </div>

    <script>
        document.getElementById('submitBtn').addEventListener('click', function () {
            console.log('Button clicked');
            var message = document.getElementById('message').value;

            // Create div for message and response
            var userMessage = document.createElement('div');
            var botMessage = document.createElement('div');

            // Attach the div to the chat container
            document.getElementById('chat-container').appendChild(userMessage);
            document.getElementById('chat-container').appendChild(botMessage);

            // Add user message to div
            userMessage.innerHTML = 'User: ' + message;

            // Add bot message to div
            botMessage.innerHTML = 'Bot: ';

            // Clear the input field
            document.getElementById('message').value = '';

            // Make a POST request
            fetch('http://localhost:11434/api/generate', {
                method: 'POST',
                body: JSON.stringify({
                    model: 'orca-mini',
                    prompt: message,

                }),
            })
            .then(response => response.body)
            .then(body => {
                const reader = body.getReader();

                console.log('Reading stream...');

                // Read the stream
                function read() {
                    return reader.read().then(({ value, done }) => {
                        if (done) {
                            console.log('Stream complete');
                            return;
                        }

                        // Assuming value is a Uint8Array containing JSON data
                        const jsonString = new TextDecoder().decode(value);
                        const jsonData = JSON.parse(jsonString);

                        console.log('Received chunk:', jsonData);
                        // Process the received chunk as needed

                        // Append the chunk to the placeholder element
                        botMessage.innerHTML += jsonData.response;

                        // Continue reading the stream
                        return read();
                    });
                }

                // Start reading the stream
                read();
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
@endsection
