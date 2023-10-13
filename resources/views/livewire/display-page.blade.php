<x-app-layout>
    <div class="py-8 md:py-12">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">
            <form action="{{ route('display')}}" method="post" class="w-full h-fit flex items-center justify-center bg-white opacity-90 rounded-full border-2 border-opacity-50 focus-within:border-celadon">
                @csrf
                <input type="text" name="location" id="location" class="rounded-full bg-transparent outline-none border-none w-full h-10 md:h-12 text-xl md:text-2xl p-4 pl-5 md:pl-9 focus:outline-none focus:ring-transparent focus:border-none" placeholder="Enter a region or area">
                <button type="submit">
                    <div class="flex items-center justify-center text-white h-9 w-9 md:h-10 md:w-10 mr-1 md:mr-2 rounded-full bg-celadon"></div>
                </button>
            </form>
            @error('location')
            <div class="text-red-500 mt-2 pl-4 text-sm">
                {{ $message}}
            </div>
            @enderror
            @livewire('search-result')
            
        </div>
        @isset($loca) 
         <div id="myElement" data-my-data="{{ $loca }}"></div>
        @endisset

    </div>
    <script type="module" src="{{ asset('client/js/displayPage.js')}}"></script>
</x-app-layout>

