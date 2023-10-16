<x-app-layout>
    <div class="py-8 pb-40 md:py-12">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">
            @livewire('comments', ['post' => $post])
            <div>

            </div>
        </div>
    </div>

    <div class="w-full h-fit fixed left-1/5 bottom-0">
        <div id="close" class="w-fit px-4 py-2 ml-10 mb-10 bg-amethyst text-white rounded hover:cursor-pointer">Add Comment</div>
        <div id="create_post" class="w-full mt-4 h-64 bg-gray-200 p-4 hidden items-center justify-center">
            <form action="{{ route('addComment', $post)}}" method="POST" class="w-4/5">
                @csrf
                <label for="body"></label>
               <textarea name="body" id="body" cols="30" rows="5" class="bg-gray-100 border-2 w-full text-md focus:ring-amethyst focus:ring-2 focus:border-none focus:outline-none p-4 rounded-lg @error('body')
                            border-red-500 @enderror" placeholder="Share your thoughts on this post"></textarea>
                @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message}}
                    </div>
                @enderror
    
                <div class="mt-2">
                    <button type="submit" class="bg-celadon text-amethyst px-4 py-2 rounded font-medium">comment</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('client/js/comments.js') }}"></script>
</x-app-layout>