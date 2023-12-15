@extends('layouts.app')

@section('content')
    <div>
        <div>
            {{-- chat body --}}
            <div class="position-relative px-6 py-24 h-[100%] min-h-screen" id="chat-container">

            </div>

            {{-- chat input --}}
            <div class="flex fixed bottom-[10%] sm:w-[500px] w-full p-4 bg-white text-white border-t gap-x-4">
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

        <script>
            document.getElementById('submitBtn').addEventListener('click', function() {
                console.log('Button clicked');
                var message = document.getElementById('message').value;

                var user = generateUserMessage(message);
                var bot = generateBotResponse();
                var botResponse = bot.querySelector('p');

                // Attach the div to the chat container
                document.getElementById('chat-container').appendChild(user);
                document.getElementById('chat-container').appendChild(bot);

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
                            return reader.read().then(({
                                value,
                                done
                            }) => {
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
                                botResponse.textContent += jsonData.response;

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

                // Scroll to the bottom of the chat container
                document.getElementById('chat-container').scrollTo({
                    top: document.getElementById('chat-container').scrollHeight,
                    behavior: 'smooth'
                });
            });

            function generateUserMessage(messageText) {
                // Create the main container div
                var containerDiv = document.createElement('div');
                containerDiv.classList.add('flex', 'flex-row-reverse', 'items-start', 'gap-x-4', 'mb-6');

                // Create the user avatar div
                var userAvatarDiv = document.createElement('div');
                userAvatarDiv.innerHTML = `
                    <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden rounded-full border-2 border-green-400">
                        <img src="{{ asset('assets/greengard_icon.svg') }}" alt="">
                    </div>
                    <div class="relative">
                        <span class="bottom-0 right-7 absolute w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-white rounded-full"></span>
                    </div>
                `;
                containerDiv.appendChild(userAvatarDiv);

                // Create the user message div
                var userMessageDiv = document.createElement('div');
                userMessageDiv.classList.add('flex-1', 'min-w-0', 'text-right');

                var messageContentDiv = document.createElement('div');
                messageContentDiv.classList.add('inline-block', 'bg-green-500', 'text-gray-800', 'p-3', 'rounded-lg',
                    'break-words', 'max-w-[80%]');
                messageContentDiv.innerHTML = `<p class="text-white">${messageText}</p>`;

                userMessageDiv.appendChild(messageContentDiv);
                containerDiv.appendChild(userMessageDiv);

                // Append the generated HTML to the body or any other container
                document.body.appendChild(containerDiv);

                return containerDiv;
            }

            function generateBotResponse() {
                // Create the main container div
                var containerDiv = document.createElement('div');
                containerDiv.classList.add('flex', 'gap-x-4', 'items-start', 'mb-6');

                // Create the bot profile div
                var botProfileDiv = document.createElement('div');
                botProfileDiv.innerHTML = `
                    <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-slate-800 rounded-full dark:bg-green-600">
                        <span class="font-medium text-white dark:text-gray-300"></span>
                    </div>
                    <div class="relative">
                        <span class="bottom-0 left-7 absolute w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-white rounded-full"></span>
                    </div>
                `;
                containerDiv.appendChild(botProfileDiv);

                // Create the bot response div
                var botResponseDiv = document.createElement('div');
                botResponseDiv.classList.add('flex', 'min-w-0');

                var responseContentDiv = document.createElement('div');
                responseContentDiv.classList.add('inline-block', 'bg-slate-800', 'p-3', 'rounded-lg', 'break-words',
                    'max-w-[80%]');
                responseContentDiv.innerHTML = `<p class="text-white" id="bot-response"></p>`;

                botResponseDiv.appendChild(responseContentDiv);
                containerDiv.appendChild(botResponseDiv);

                // Append the generated HTML to the body or any other container
                document.body.appendChild(containerDiv);

                return containerDiv;
            }
        </script>
    @endsection
