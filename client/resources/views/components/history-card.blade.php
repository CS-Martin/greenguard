<table class="table-auto">
    <div class="flex justify-end">
        <form action="{{ route('prediction.delete.all') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500">Delete All</button>
        </form>
    </div>
    <tbody>
        <tr>
            <a href="{{ route('prediction', ['id' => $prediction->id]) }}">
                <div class="py-3  border-b hover:bg-gray-100">
                    <div>
                        <p> {{ $prediction->result }} </p>
                    </div>
                    <div class="flex justify-between">
                        <small class="text-[#8A8A8A]"> {{ $prediction->created_at->format('M d, Y') }} </small>
                        <small class="text-right text-[#8A8A8A]"> {{ $prediction->created_at->format('g:i A') }}
                        </small>
                    </div>

                    {{-- Add delete button --}}
                    <div class="flex justify-end">
                        <form action="{{ route('prediction.delete', ['id' => $prediction->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </div>
                </div>
            </a>
        </tr>
    </tbody>
</table>
