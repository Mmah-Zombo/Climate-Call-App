<x-app-layout>
    <div class="py-8 md:py-12">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">
            <form action="{{ route('display')}}" method="post" class="w-full h-fit flex items-center justify-center bg-white opacity-90 rounded-full border-2 border-opacity-50 focus-within:border-celadon">
                @csrf
                <input type="text" name="location" id="location" class="rounded-full bg-transparent outline-none border-none w-full h-10 md:h-16 text-xl md:text-2xl p-4 pl-5 md:pl-9 focus:outline-none focus:ring-transparent focus:border-none" placeholder="Enter the region or area">
                <button type="submit">
                    <div class="flex items-center justify-center text-white h-9 w-9 md:h-14 md:w-14 mr-1 md:mr-2 rounded-full bg-celadon"></div>
                </button>
            </form>

            @error('location')
            <div class="text-red-500 mt-2 pl-4 text-sm">
                {{ $message}}
            </div>
            @enderror

            {{-- Search hisroty and current location data navigation menu --}}
            <div class="mt-5 md:mt-20 mb-10 w-full h-fit border-b-2 border-chryslerBlue border-opacity-30 flex">
                <p class="nav ml-4 mr-10 text-lg text-chryslerBlue hover:bg-teaGreen hover:cursor-pointer py-2 md:py-4 px-2 rounded-t-xl">Weather Info</p>
                <p class="nav text-lg text-chryslerBlue hover:bg-teaGreen hover:cursor-pointer py-2 md:py-4 px-2 rounded-t-xl">Search History</p>
            </div>
            
            <div class="mb-8 h-fit md:h-96 overflow-hidden shadow-2xl sm:rounded-lg flex flex-col md:grid grid-cols-3" id="W_info">
                <div class="col-span-2 py-2 px-4 md:p-4 bg-white flex flex-col items-center justify-between">
                   <div class="text-amethyst font-medium w-full md:w-4/5 h-fit pt-1"><p>Current Location</p></div>
                   <div class="w-full flex items-center justify-center"><img src="" alt="weather_icon" class="w-32 h-32" id="weather_icon"></div>
                   <div class="w-full md:w-4/5 h-fit flex text-purple-700 items-center justify-between">
                        <div class="text-4xl font-bold md:font-normal md:text-9xl" id="temp">26&deg;</div>
                        <div class="w-fit text-center md:text-left mx-2">
                            <p class="md:text-2xl font-medium" id="place">City Name</p>
                            <p class="md:text-lg" id="day">Date and Time</p> 
                        </div>
                        <p class="md:text-lg w-fit uppercase md:ml-4 text-center md:text-left" id="weather">Sunny</p>
                   </div>
                </div>
                <div class="col-span-1 h-full w-full bg-teaGreen p-4">
                    <div class="text-purple-700 w-full h-full border-t-2 border-white flex flex-col items-start justify-between">
                        <p class="text-lg font-bold md:px-2 pt-1 mb-2 md:mb-0">Weather Details</p>
                        <div class="text-lg w-full text-purple-700 pb-2 border-b-2 border-white" id="extraData">
                            {{-- Dynamic content --}}
                        </div>
                    </div>
                </div>
            </div>
            @if($history->count())
            <div class="hidden" id="Shistory">
                @livewire('clear-history')
                @foreach ($history as $search)
                <div class="text-lg w-full h-fit px-4 py-2 bg-amethyst text-white mb-4 rounded-lg hover:bg-teaGreen hover:text-amethyst hover:h-14 flex items-center justify-between">
                    <p>{{$search->location}}</p>
                    <p>{{ $search->created_at->diffForHumans()}}</p>
                    @livewire('delete-search', ['searchToDelete' => $search->id])
                </div>
               @endforeach
            </div>
              
            @else
                <div class="hidden text-lg px-4 text-gray-600" id="Shistory">You have no search history! Make your first search.</div>
            @endif
        </div>
    </div>
    <script type="module" src="{{ asset('client/js/dashboard.js') }}"></script>
</x-app-layout>
