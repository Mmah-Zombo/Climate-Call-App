<div class="w-full flex flex-col items-center justify-between">
    @isset($allPosts)  
    @foreach ($allPosts as $post)   
    <div class="w-full md:w-1/2 h-fit px-4 py-2 mb-4 bg-white rounded shadow">
        <div class="w-full flex items-center justify-between">
            <div class="w-fit flex items-center justify-between">
                <p class="text-amethyst font-bold text-md">{{ $post->user->name }}</p>
                <p class="ml-4 text-celadon">
                    @if (isset($post->updated_at))
                    {{ $post->updated_at->diffForHumans() }}
                    @else
                    {{ $post->created_at->diffForHumans() }}
                    @endif
                </p>
                @if (Auth::check() && $post->user_id === Auth::user()->id)
                    <p id="edit_btn" wire:click='toggle({{ $post->id }})' class="ml-4 text-gray-500 hover:cursor-pointer">edit</p>
                @endif
            </div>
            @if (Auth::check() && $post->user_id === Auth::user()->id)
                <div wire:click="delete({{ $post->id }})" class="text-red-500 px-4 py-2 rounded hover:bg-red-500 hover:text-white hover:cursor-pointer">X</div>
            @endif
        </div>
        <div class="w-full mt-1 flex flex-wrap">        
            <p class="w-full">{{ $post->content }}</p>
        </div>

        <div class="@if ($post->id == $editId)
                block @elseif ($post->id != $editId)
                hidden
            @endif mt-2" id="edit">
            <form action="/update_post/{{$post->id}}" method="POST">
                @csrf
                <label for="content"></label>
                
               <textarea name="content" id="content" cols="30" rows="5" class="bg-gray-100 border-2 w-full text-md focus:ring-amethyst focus:ring-2 focus:border-none focus:outline-none p-4 rounded-lg @error('content')
                            border-red-500 @enderror">{{ $post->content }}</textarea>
                @error('content')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message}}
                    </div>
                @enderror
    
                <div class="mt-2">
                    <button type="submit" class="bg-celadon text-amethyst px-4 py-2 rounded font-medium">Save</button>
                </div>
            </form>
        </div>
    </div>
    @endforeach
    @endisset
</div>
