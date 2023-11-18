<table class="table-auto">
    <tbody>
            <tr >
                <a href="{{ route('prediction', ['id' => $prediction->id]) }}">
                    <div class="py-3  border-b hover:bg-gray-100">
                        <div>
                            <p> {{ $prediction->result }} </p>
                        </div>
                        <div class="flex justify-between">
                            <small class="text-[#8A8A8A]"> {{ $prediction->created_at->format('M d, Y') }} </small>
                            <small class="text-right text-[#8A8A8A]"> {{ $prediction->created_at->format('g:i A') }} </small>
                        </div>
                    </div>
                </a>
            </tr>
    </tbody>
</table>
