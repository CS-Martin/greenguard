<table class="table-auto">
    @if (request()->is('/'))
        <div>
            <p class="font-bold">Recent Detections</p>
        </div>
    @endif
    <tbody>
        @for ($i = 0; $i < 20; $i++)
            <tr >
                <a href="prediction/*">
                    <div class="py-3 px-2 border-b hover:bg-gray-100">
                        <div>
                            <p>The Sliding Mr. Bones (Next Stop, Pottersville)</p>
                        </div>

                        <div class="flex justify-between">
                            <small class="text-[#8A8A8A]">August 28, 2023</small>
                            <small class="text-right text-[#8A8A8A]">10:59 PM</small>
                        </div>
                    </div>
                </a>
            </tr>
            @endfor
    </tbody>
</table>
