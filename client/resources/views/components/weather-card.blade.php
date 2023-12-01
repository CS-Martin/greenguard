<div id="category" class="flex flex-row gap-x-2 overflow-x-auto w-full mb-8">
    @foreach ($weatherData['temperature'] as $key => $temperature)
        <button
            class="bg-slate-50 rounded-lg text-center w-fit py-6 px-5 text-slate-600 text-sm my-3
            @if ($key == 0) active-card @endif">
            <p class="text-center @if ($key == 0) active-card @endif">
                {{ $currentTime->copy()->addHours($key)->format('h:i A') }}</p>
            <div class="flex justify-center">
                @php
                    $weatherDescription = $weatherData['weather'][$key];
                @endphp

                @if (stripos($weatherDescription, 'Clear Sky') !== false)
                    {{-- Clear sky --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 160 160"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M80 115.76C84.7367 115.825 89.4391 114.948 93.834 113.18C98.2289 111.412 102.229 108.788 105.601 105.462C108.974 102.135 111.652 98.1711 113.479 93.8008C115.307 89.4304 116.248 84.7405 116.248 80.0033C116.248 75.2662 115.307 70.5762 113.479 66.2059C111.652 61.8355 108.974 57.8719 105.601 54.5452C102.229 51.2184 98.2289 48.5949 93.834 46.827C89.4391 45.0591 84.7367 44.182 80 44.2467C70.6013 44.375 61.631 48.1987 55.0301 54.8904C48.4291 61.5821 44.7282 70.6038 44.7282 80.0033C44.7282 89.4029 48.4291 98.4245 55.0301 105.116C61.631 111.808 70.6013 115.632 80 115.76ZM80 122.427C91.2522 122.427 102.044 117.957 110 110C117.957 102.044 122.427 91.2522 122.427 80C122.427 68.7477 117.957 57.9564 110 49.9998C102.044 42.0433 91.2522 37.5733 80 37.5733C68.7477 37.5733 57.9564 42.0433 49.9998 49.9998C42.0433 57.9564 37.5733 68.7477 37.5733 80C37.5733 91.2522 42.0433 102.044 49.9998 110C57.9564 117.957 68.7477 122.427 80 122.427ZM80 10C80.8841 10 81.7319 10.3512 82.357 10.9763C82.9821 11.6014 83.3333 12.4493 83.3333 13.3333V25.4533C83.3333 26.3374 82.9821 27.1852 82.357 27.8104C81.7319 28.4355 80.8841 28.7867 80 28.7867C79.1159 28.7867 78.2681 28.4355 77.643 27.8104C77.0179 27.1852 76.6667 26.3374 76.6667 25.4533V13.3333C76.6667 12.4493 77.0179 11.6014 77.643 10.9763C78.2681 10.3512 79.1159 10 80 10ZM10 80C10 79.1159 10.3512 78.2681 10.9763 77.643C11.6014 77.0179 12.4493 76.6667 13.3333 76.6667H25.4533C26.3374 76.6667 27.1852 77.0179 27.8104 77.643C28.4355 78.2681 28.7867 79.1159 28.7867 80C28.7867 80.8841 28.4355 81.7319 27.8104 82.357C27.1852 82.9821 26.3374 83.3333 25.4533 83.3333H13.3333C12.4493 83.3333 11.6014 82.9821 10.9763 82.357C10.3512 81.7319 10 80.8841 10 80ZM131.213 80C131.213 79.1159 131.565 78.2681 132.19 77.643C132.815 77.0179 133.663 76.6667 134.547 76.6667H146.667C147.551 76.6667 148.399 77.0179 149.024 77.643C149.649 78.2681 150 79.1159 150 80C150 80.8841 149.649 81.7319 149.024 82.357C148.399 82.9821 147.551 83.3333 146.667 83.3333H134.547C133.663 83.3333 132.815 82.9821 132.19 82.357C131.565 81.7319 131.213 80.8841 131.213 80ZM30.5 129.5C29.8751 128.875 29.524 128.027 29.524 127.143C29.524 126.259 29.8751 125.412 30.5 124.787L39.0733 116.213C39.3808 115.895 39.7486 115.641 40.1553 115.466C40.562 115.292 40.9994 115.2 41.442 115.196C41.8846 115.192 42.3235 115.276 42.7332 115.444C43.1428 115.612 43.515 115.859 43.828 116.172C44.141 116.485 44.3885 116.857 44.5561 117.267C44.7237 117.676 44.808 118.115 44.8042 118.558C44.8003 119.001 44.7084 119.438 44.5337 119.845C44.359 120.251 44.105 120.619 43.7867 120.927L35.2133 129.5C34.5882 130.125 33.7405 130.476 32.8567 130.476C31.9728 130.476 31.1251 130.125 30.5 129.5ZM116.213 43.7867C115.588 43.1616 115.237 42.3139 115.237 41.43C115.237 40.5461 115.588 39.6984 116.213 39.0733L124.787 30.5C125.094 30.1816 125.462 29.9277 125.869 29.753C126.275 29.5783 126.713 29.4863 127.155 29.4825C127.598 29.4787 128.037 29.563 128.447 29.7306C128.856 29.8982 129.228 30.1457 129.541 30.4587C129.854 30.7717 130.102 31.1438 130.269 31.5535C130.437 31.9631 130.521 32.4021 130.517 32.8447C130.514 33.2873 130.422 33.7247 130.247 34.1313C130.072 34.538 129.818 34.9058 129.5 35.2133L120.927 43.7867C120.302 44.4116 119.454 44.7626 118.57 44.7626C117.686 44.7626 116.838 44.4116 116.213 43.7867ZM30.5 30.5C31.1251 29.8751 31.9728 29.524 32.8567 29.524C33.7405 29.524 34.5882 29.8751 35.2133 30.5L43.7867 39.0733C44.105 39.3808 44.359 39.7486 44.5337 40.1553C44.7084 40.562 44.8003 40.9994 44.8042 41.442C44.808 41.8846 44.7237 42.3235 44.5561 42.7332C44.3885 43.1428 44.141 43.515 43.828 43.828C43.515 44.141 43.1428 44.3885 42.7332 44.5561C42.3235 44.7237 41.8846 44.808 41.442 44.8042C40.9994 44.8003 40.562 44.7084 40.1553 44.5337C39.7486 44.359 39.3808 44.105 39.0733 43.7867L30.5 35.2133C29.8751 34.5882 29.524 33.7405 29.524 32.8567C29.524 31.9728 29.8751 31.1251 30.5 30.5ZM116.213 116.213C116.838 115.588 117.686 115.237 118.57 115.237C119.454 115.237 120.302 115.588 120.927 116.213L129.5 124.787C129.809 125.097 130.055 125.464 130.222 125.869C130.39 126.274 130.475 126.708 130.475 127.146C130.475 127.584 130.388 128.017 130.22 128.422C130.053 128.826 129.807 129.194 129.497 129.503C129.187 129.813 128.819 130.058 128.414 130.226C128.009 130.393 127.576 130.479 127.138 130.479C126.7 130.478 126.266 130.392 125.861 130.224C125.457 130.056 125.089 129.81 124.78 129.5L116.213 120.927C115.588 120.302 115.237 119.454 115.237 118.57C115.237 117.686 115.588 116.838 116.213 116.213ZM80 131.213C80.8841 131.213 81.7319 131.565 82.357 132.19C82.9821 132.815 83.3333 133.663 83.3333 134.547V146.667C83.3333 147.551 82.9821 148.399 82.357 149.024C81.7319 149.649 80.8841 150 80 150C79.1159 150 78.2681 149.649 77.643 149.024C77.0179 148.399 76.6667 147.551 76.6667 146.667V134.547C76.6667 133.663 77.0179 132.815 77.643 132.19C78.2681 131.565 79.1159 131.213 80 131.213Z"
                            fill="#55C388" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M69.9733 54.6667C70.236 55.0169 70.4271 55.4154 70.5357 55.8394C70.6444 56.2635 70.6684 56.7048 70.6065 57.1381C70.5446 57.5715 70.398 57.9884 70.1749 58.365C69.9519 58.7417 69.6569 59.0707 69.3067 59.3334L67.8133 60.4534C62.8358 64.1887 59.143 69.3795 57.2467 75.3067L56.5133 77.6067C56.2437 78.4492 55.6504 79.1501 54.864 79.5552C54.0776 79.9603 53.1625 80.0363 52.32 79.7667C51.4775 79.4971 50.7766 78.9038 50.3715 78.1174C49.9665 77.331 49.8904 76.4159 50.16 75.5734L50.8933 73.28C53.2132 66.0319 57.7309 59.6852 63.82 55.12L65.3133 54C65.6635 53.7374 66.062 53.5463 66.4861 53.4377C66.9101 53.329 67.3514 53.305 67.7847 53.3669C68.2181 53.4288 68.635 53.5754 69.0117 53.7985C69.3883 54.0215 69.7107 54.3165 69.9733 54.6667Z"
                            fill="#55C388" />
                    </svg>
                @elseif (stripos($weatherDescription, 'Drizzle') !== false)
                    {{-- Drizzle --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 488 472"
                        fill="none">
                        <path
                            d="M97.4236 278.165C175.729 285.694 255.541 283.435 333.847 281.176C355.682 280.424 378.271 279.671 400.106 278.165C433.235 275.153 467.118 268.376 479.165 237.506C501.753 202.118 476.153 163.718 437.753 149.412C434.741 147.906 430.977 147.153 427.212 145.647C435.494 103.482 408.388 66.5882 360.953 74.8706C350.412 40.2353 330.835 17.647 301.471 7.10586C269.094 -4.9412 229.941 -1.17649 202.082 16.1412C176.482 31.9529 156.906 58.3059 150.129 83.9059C133.565 74.1176 112.482 72.6117 95.1647 80.1412C85.3765 84.6588 74.0824 95.9529 67.3059 109.506C59.0236 119.294 54.5059 132.847 56.7647 145.647C35.6824 147.906 13.8471 165.224 5.56473 184.8C-2.71763 204.376 0.294139 228.471 13.8471 245.035C33.4235 269.129 66.553 275.153 97.4236 278.165ZM100.435 90.6823C116.247 83.1529 136.576 86.1647 150.882 98.2117C153.894 101.224 159.165 98.9647 159.918 94.447C163.682 68.847 183.259 41.7412 208.106 25.9294C232.953 10.8706 269.094 7.8588 298.459 18.4C325.565 28.1882 342.882 49.2706 352.671 83.1529C353.424 86.1647 356.435 87.6706 359.447 86.9176C373.753 83.9059 393.329 83.1529 406.882 97.4588C415.918 107.247 420.435 122.306 418.929 135.859C418.176 138.871 418.177 141.129 417.424 143.388C415.165 156.188 421.941 154.682 435.494 159.953C461.094 168.988 483.682 193.082 476.906 219.435C472.388 234.494 459.588 247.294 441.518 254.071C424.2 260.847 405.377 260.847 387.306 261.6C293.941 265.365 194.553 267.624 96.6706 258.588C73.3294 256.329 46.9765 253.318 31.1647 236C17.6118 221.694 13.8471 203.623 22.1294 186.306C31.9177 165.976 54.5059 153.176 76.3412 153.929C81.6118 153.929 84.6236 147.906 80.1059 144.141C74.0824 141.129 83.1177 98.2117 100.435 90.6823ZM110.977 344.424L123.776 319.576C125.282 316.565 123.776 313.553 121.518 312.047C118.506 310.541 115.494 312.047 113.988 314.306L101.188 339.153C99.6824 342.165 101.188 345.176 103.447 346.682C105.706 348.188 109.471 347.435 110.977 344.424ZM205.847 349.694C212.624 337.647 217.141 324.847 219.4 311.294C220.153 308.282 217.894 305.271 214.882 304.518C211.871 303.765 208.859 306.024 208.106 309.035C206.6 321.082 202.082 333.129 196.059 343.671C194.553 346.682 195.306 349.694 198.318 351.2C201.329 353.459 204.341 352.706 205.847 349.694ZM137.329 404.659L142.6 387.341C143.353 384.329 141.847 381.318 138.835 380.565C135.824 379.812 132.812 381.318 132.059 384.329L126.788 401.647C126.035 404.659 127.541 407.671 130.553 408.424C133.565 409.929 136.577 407.671 137.329 404.659ZM251.777 429.506L260.812 397.882C261.565 394.871 260.059 391.859 257.047 391.106C254.035 390.353 251.024 391.859 250.271 394.871L241.235 426.494C240.482 429.506 241.988 432.518 245 433.271C247.259 434.024 250.271 432.518 251.777 429.506ZM309.753 332.376L317.282 309.788C318.035 306.776 316.529 303.765 313.518 303.012C310.506 302.259 307.494 303.765 306.741 306.776L299.212 329.365C298.459 332.376 299.965 335.388 302.977 336.141C305.235 336.894 308.247 335.388 309.753 332.376ZM409.894 312.8C406.882 312.047 403.871 313.553 403.118 316.565L395.588 340.659C394.835 343.671 396.341 346.682 399.353 347.435C402.365 348.188 405.377 346.682 406.129 343.671L413.659 319.576C414.412 316.565 412.906 313.553 409.894 312.8ZM347.4 400.894C352.671 391.859 356.435 381.318 357.188 370.776C357.188 367.765 354.929 364.753 351.918 364.753C348.906 364.753 345.894 367.012 345.894 370.024C345.141 379.059 342.129 387.341 337.612 394.871C336.106 397.882 336.859 400.894 339.871 402.4C342.882 404.659 345.894 403.906 347.4 400.894ZM302.977 471.671C305.235 471.671 307.494 470.165 308.247 467.906L314.271 447.576C315.024 444.565 313.518 441.553 310.506 440.8C307.494 440.047 304.482 441.553 303.729 444.565L297.706 464.141C296.2 467.906 299.212 471.671 302.977 471.671ZM406.129 415.953C404.624 418.965 406.129 421.976 409.141 423.482C412.153 424.988 415.165 422.729 416.671 420.471L424.2 401.647C425.706 398.635 424.2 395.624 421.188 394.118C418.177 392.612 415.165 394.118 413.659 397.129L406.129 415.953ZM191.541 441.553L195.306 431.765C196.059 428.753 194.553 425.741 192.294 424.235C190.035 422.729 186.271 424.988 184.765 427.247L181 437.035C180.247 440.047 181.753 443.059 184.012 444.565C187.024 446.071 190.035 444.565 191.541 441.553Z"
                            fill="#55C388" />
                    </svg>
                @elseif (stripos($weatherDescription, 'Rain: Slight') !== false)
                    {{-- Rain --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" viewBox="0 0 46 46"
                        fill="none">
                        <path
                            d="M27.5636 15.3855C28.7054 14.9866 29.9342 14.7696 31.2143 14.7696C32.4691 14.7696 33.6745 14.9781 34.7973 15.362M34.7973 15.362C34.1878 9.95461 29.5472 5.75 23.9128 5.75C17.8639 5.75 12.9603 10.5959 12.9603 16.5735C12.9603 17.8957 13.2002 19.1625 13.6393 20.3337M34.7973 15.362C39.0866 16.8288 42.1667 20.8554 42.1667 25.5931C42.1667 29.3133 40.2675 32.595 37.375 34.5433M13.6393 20.3337C13.1244 20.2337 12.5922 20.1814 12.0477 20.1814C7.51104 20.1814 3.83337 23.8157 3.83337 28.299C3.83337 30.8097 4.98679 33.0543 6.79853 34.5433M13.6393 20.3337C14.7212 20.5436 15.7268 20.9634 16.6112 21.5483"
                            stroke="#427ACE" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M32.5833 36.4167L28.75 40.25" stroke="#55C388" stroke-width="1.5"
                            stroke-linecap="round" />
                        <path d="M30.6667 29.7083L26.8334 33.5416" stroke="#55C388" stroke-width="1.5"
                            stroke-linecap="round" />
                        <path d="M23 38.3333L19.1666 42.1666" stroke="#55C388" stroke-width="1.5"
                            stroke-linecap="round" />
                        <path d="M22.0417 29.7083L18.2084 33.5416" stroke="#55C388" stroke-width="1.5"
                            stroke-linecap="round" />
                        <path d="M14.375 36.4167L10.5416 40.25" stroke="#55C388" stroke-width="1.5"
                            stroke-linecap="round" />
                    </svg>
                @elseif (stripos($weatherDescription, 'Thunderstorm') !== false)
                    {{-- Thunderstorm --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 46 46"
                        fill="none">
                        <path
                            d="M27.5636 15.3855C28.7054 14.9866 29.9342 14.7696 31.2143 14.7696C32.4691 14.7696 33.6745 14.9781 34.7973 15.362M34.7973 15.362C34.1878 9.95461 29.5472 5.75 23.9128 5.75C17.8639 5.75 12.9603 10.5959 12.9603 16.5735C12.9603 17.8957 13.2002 19.1625 13.6393 20.3337M34.7973 15.362C39.0866 16.8288 42.1667 20.8554 42.1667 25.5931C42.1667 29.3133 40.2675 32.595 37.375 34.5433M13.6393 20.3337C13.1244 20.2337 12.5922 20.1814 12.0477 20.1814C7.51104 20.1814 3.83337 23.8157 3.83337 28.299C3.83337 30.8097 4.98679 33.0543 6.79853 34.5433M13.6393 20.3337C14.7212 20.5436 15.7268 20.9634 16.6112 21.5483"
                            stroke="#55C388" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M32.5833 36.4167L28.75 40.25" stroke="#55C388" stroke-width="1.5"
                            stroke-linecap="round" />
                        <path d="M28.75 29.7083L24.9166 33.5416" stroke="#55C388" stroke-width="1.5"
                            stroke-linecap="round" />
                        <path d="M24.9167 38.3333L21.0834 42.1666" stroke="#55C388" stroke-width="1.5"
                            stroke-linecap="round" />
                        <path d="M11.5 42.9044L19.7143 35.8275H11.5L19.7143 28.75" stroke="#55C388" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                @elseif (stripos($weatherDescription, 'Snow') !== false)
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35"
                        fill="none">
                        <path
                            d="M15.1288 5.04763C15.8319 4.30281 16.8814 3.82963 18.0528 3.82963C18.6891 3.82963 19.2877 3.96983 19.8155 4.21586C20.5657 2.34135 22.5608 1 24.9045 1C27.451 1 29.5844 2.58265 30.1587 4.7133C31.2385 4.78475 32.2165 5.18446 32.9701 5.80188M34.3175 7.7465C34.4386 8.12428 34.5002 8.51858 34.5002 8.91529C34.5002 11.1976 32.4821 13.0553 29.9632 13.1274H29.9618C29.2595 14.1593 28.1197 14.8927 26.7952 15.0808"
                            stroke="#55C388" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M30.7063 10.7215C30.7063 11.6093 30.4329 12.4359 29.9626 13.1278M30.0333 6.91518C30.1963 6.50927 30.2844 6.07599 30.2844 5.62614C30.2844 5.31277 30.2416 5.0075 30.1606 4.71389M3.12277 11.0729C1.83333 12.0233 0.984706 13.4556 1.00021 15.0565C1.00021 17.9131 3.59865 20.2284 6.80372 20.2284C8.16327 20.2284 9.41362 19.8105 10.4024 19.1129C10.7354 19.4377 11.1223 19.7262 11.5524 19.9709M5.33094 10.0497C5.99824 9.88926 6.70464 9.83668 7.42047 9.91352V9.91217C7.39351 7.04412 9.89691 4.70452 12.8863 4.71126C15.3553 4.71126 17.4408 6.25953 18.1182 8.38614C18.5288 8.23116 18.9641 8.15191 19.4029 8.15225C21.3199 8.15225 22.8904 9.63177 23.0401 11.5124C25.1006 11.8487 26.6684 13.548 26.6684 15.5944C26.6684 17.8814 24.709 19.7357 22.2912 19.7357C21.3583 19.7357 20.4942 19.4586 19.7838 18.9875C18.6965 20.1226 16.9717 20.8559 15.0304 20.8559C14.6037 20.8559 14.1879 20.8202 13.7868 20.7528"
                            stroke="#55C388" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M9.36357 10.4126C8.76563 10.1502 8.10972 9.97701 7.41754 9.91217M19.7834 18.9872C20.3815 18.3073 20.8058 17.5993 20.9797 16.7784M9.17599 17.1866C9.40725 17.9051 9.83318 18.5596 10.4051 19.1103M23.04 11.5126C22.7735 11.4662 22.5014 11.4263 22.2205 11.4263C21.4797 11.4263 20.7811 11.595 20.1665 11.8935"
                            stroke="#55C388" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M13.8343 33.4885C14.5248 33.4885 15.0846 32.9281 15.0846 32.2367C15.0846 31.5453 14.5248 30.9849 13.8343 30.9849C13.1438 30.9849 12.584 31.5453 12.584 32.2367C12.584 32.9281 13.1438 33.4885 13.8343 33.4885Z"
                            stroke="#55C388" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M16.2934 25.9215C16.8518 25.9215 17.3044 25.4682 17.3044 24.9091C17.3044 24.35 16.8518 23.8968 16.2934 23.8968C15.735 23.8968 15.2823 24.35 15.2823 24.9091C15.2823 25.4682 15.735 25.9215 16.2934 25.9215Z"
                            stroke="#55C388" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M2.01125 30.3761C2.56965 30.3761 3.02232 29.9228 3.02232 29.3637C3.02232 28.8046 2.56965 28.3514 2.01125 28.3514C1.45285 28.3514 1.00018 28.8046 1.00018 29.3637C1.00018 29.9228 1.45285 30.3761 2.01125 30.3761Z"
                            stroke="#55C388" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M26.3667 22.804C26.9251 22.804 27.3777 22.3508 27.3777 21.7916C27.3777 21.2325 26.9251 20.7793 26.3667 20.7793C25.8083 20.7793 25.3556 21.2325 25.3556 21.7916C25.3556 22.3508 25.8083 22.804 26.3667 22.804Z"
                            stroke="#55C388" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M29.945 34.2329C30.5034 34.2329 30.956 33.7796 30.956 33.2205C30.956 32.6614 30.5034 32.2082 29.945 32.2082C29.3866 32.2082 28.9339 32.6614 28.9339 33.2205C28.9339 33.7796 29.3866 34.2329 29.945 34.2329Z"
                            stroke="#55C388" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M30.5379 17.108L33.4745 21.8079M29.945 17.992L31.283 18.3005L31.5912 16.9608M32.4213 21.955L32.7294 20.6153L34.0674 20.9239M34.3532 17.9877L29.6592 20.9281M33.4703 17.3941L33.1621 18.7338L34.5001 19.0423M29.5122 19.8735L30.8503 20.182L30.5421 21.5217M9.43902 23.1874L8.05979 28.5564M8.39061 23.3661L9.08906 24.5497L10.2711 23.8503M7.22762 27.8934L8.40976 27.1941L9.1082 28.3777M11.4306 26.5624L6.0682 25.1814M11.2521 25.5126L10.0699 26.212L10.7684 27.3955M6.73038 24.3482L7.42882 25.5318L6.24675 26.2311M26.6684 27.3602L18.8592 29.4028M25.6984 26.1492L24.6869 27.8785L26.4139 28.8913M19.1136 27.8717L20.8407 28.8846L19.8291 30.6138M23.7838 32.291L21.7437 24.472M24.9932 31.3199L23.2661 30.307L22.2546 32.0363M23.2729 24.7268L22.2613 26.456L20.5343 25.4432M5.37366 30.7874V31.3744M3.51978 32.6436H4.10599M5.37366 34.5V33.9129M7.22762 32.6436H6.64134"
                            stroke="#55C388" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 46 46"
                        fill="none">
                        <path
                            d="M27.5636 21.1355C28.7054 20.7366 29.9342 20.5196 31.2143 20.5196C32.4691 20.5196 33.6745 20.7282 34.7973 21.1121M34.7973 21.1121C39.0866 22.5787 42.1667 26.6054 42.1667 31.3431C42.1667 37.3208 37.2631 42.1667 31.2143 42.1667H12.0477C7.51104 42.1667 3.83337 38.5323 3.83337 34.049C3.83337 29.5657 7.51104 25.9313 12.0477 25.9313C12.5922 25.9313 13.1244 25.9837 13.6393 26.0837M34.7973 21.1121C34.1878 15.7046 29.5472 11.5 23.9128 11.5C17.8639 11.5 12.9603 16.3459 12.9603 22.3236C12.9603 23.6457 13.2002 24.9124 13.6393 26.0837M13.6393 26.0837C14.7212 26.2936 15.7268 26.7134 16.6112 27.2983"
                            stroke="#55C388" stroke-width="1.5" stroke-linecap="round" />
                        <path
                            d="M15.3333 8.625C11.6284 8.625 8.625 11.6284 8.625 15.3333C8.625 18.0094 10.1919 20.3195 12.4583 21.3961M15.3333 8.625C16.7586 8.625 18.0801 9.06949 19.1667 9.8274M15.3333 8.625C13.9081 8.625 12.5866 9.06949 11.5 9.8274M15.3333 8.625C17.1612 8.625 18.8183 9.35604 20.0282 10.5417M15.3333 8.625C13.5055 8.625 11.8484 9.35604 10.6385 10.5417M15.3333 8.625C17.7736 8.625 19.9096 9.92793 21.0833 11.8761"
                            stroke="#55C388" stroke-width="1.5" />
                        <path d="M14.375 3.83334V4.79168" stroke="#55C388" stroke-width="1.5"
                            stroke-linecap="round" />
                        <path d="M4.79171 14.375H3.83337" stroke="#55C388" stroke-width="1.5"
                            stroke-linecap="round" />
                        <path d="M21.8284 6.92172L21.4142 7.33584" stroke="#55C388" stroke-width="1.5"
                            stroke-linecap="round" />
                        <path d="M7.33538 21.4147L6.92126 21.8287" stroke="#55C388" stroke-width="1.5"
                            stroke-linecap="round" />
                        <path d="M7.33538 7.33538L6.92126 6.92126" stroke="#55C388" stroke-width="1.5"
                            stroke-linecap="round" />
                    </svg>
                @endif
            </div>
            <p class="@if ($key == 0) active-card @endif">{{ $temperature }}°</p>
        </button>
    @endforeach
</div>
<style scoped>
    .active-card {
        background: #55c388 !important;
        color: white !important;
        font-weight: 600 !important;
    }

    .active-card svg path {
        stroke: white !important;
    }
</style>