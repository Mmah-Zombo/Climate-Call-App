<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('display')}}" method="post" class="w-full h-fit flex items-center justify-center bg-white opacity-90 rounded-full border-2 border-opacity-50 focus-within:border-celadon">
                @csrf
                <input type="text" name="location" id="location" class="rounded-full bg-transparent outline-none border-none w-full h-10 md:h-16 text-xl md:text-2xl p-4 pl-5 md:pl-9 focus:outline-none focus:ring-transparent focus:border-none" placeholder="Enter the region or area">
                <button type="submit">
                    <div class="flex items-center justify-center text-white h-10 md:h-14 w-20 md:w-14 mr-2 rounded-full bg-celadon"></div>
                </button>
            </form>

            @error('location')
            <div class="text-red-500 mt-2 pl-4 text-sm">
                {{ $message}}
            </div>
            @enderror

            <div class="mt-20 mb-10 w-full h-fit border-b-2 border-chryslerBlue border-opacity-30 flex">
                <p class="nav ml-4 mr-10 text-lg text-chryslerBlue hover:bg-teaGreen hover:cursor-pointer py-4 px-2 rounded-t-xl">Weather Info</p>
                <p class="nav text-lg text-chryslerBlue hover:bg-teaGreen hover:cursor-pointer py-4 px-2 rounded-t-xl">Search History</p>
            </div>
            {{-- Search hisroty and current location data navigation menu --}}
            <div class="mb-10 h-96 overflow-hidden shadow-2xl sm:rounded-lg grid grid-cols-3" id="W_info">
                <div class="col-span-2 p-4 bg-white flex flex-col items-center justify-between">
                   <div class="text-amethyst font-medium w-4/5 h-fit pt-1"><p>Current Location</p></div>
                   <div class="w-full flex items-center justify-center"><img src="" alt="weather_icon" class="w-32 h-32" id="weather_icon"></div>
                   <div class="w-4/5 h-fit flex text-purple-700 items-center justify-between">
                        <div class="text-9xl" id="temp">26&deg;</div>
                        <div >
                            <p class="text-2xl font-medium" id="place">City Name</p>
                            <p class="text-lg" id="day">Date and Time</p> 
                        </div>
                        <p class="text-lg uppercase ml-4" id="weather">Sunny</p>
                       
                        
                        <div></div>
                   </div>
                </div>
                <div class="col-span-1 h-full w-full bg-teaGreen p-4">
                    <div class="text-purple-700 w-full h-full border-t-2 border-white flex flex-col items-start justify-between">
                        <p class="text-lg font-bold px-2 pt-1">Weather Details</p>
                        <div class="text-lg w-full text-purple-700 pb-2 border-b-2 border-white" id="extraData">
                            {{-- Dynamic content --}}
                        </div>
                    </div>
                </div>
            </div>
            @if($history->count())
            <div class="hidden" id="Shistory">
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
