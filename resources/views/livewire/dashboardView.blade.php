<div>
    @if($history->count()) 
        <div wire:click='clear' id="clearHistory" class="w-fit h-fit p-2 hover:cursor-pointer hover:bg-red-500 hover:text-white hover:rounded text-purple-700 mb-4 bg-gray-200">
            <p>Clear history</p>
        </div>
        @foreach ($history as $search)
        <div class="text-lg w-full h-fit px-4 py-2 bg-amethyst text-white mb-4 rounded-lg hover:bg-teaGreen hover:text-amethyst hover:h-14 flex items-center justify-between">
            <p>{{ $search->location }}</p>
            <p>{{ $search->created_at->diffForHumans() }}</p>
            <div wire:click="delete({{ $search->id }})" id="delete" class="hover:bg-red-500 hover:cursor-pointer hover:text-white rounded h-full w-fit px-4 flex items-center">
                X
            </div>
            
        </div>
        @endforeach
    @else
        <div class="text-lg px-4 text-gray-600">You have no search history!</div>
    @endif
</div>
