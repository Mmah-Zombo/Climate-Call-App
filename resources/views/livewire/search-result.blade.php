<div id="result" class="border border-amethyst shadow-xl w-full h-[35rem] mt-10 grid grid-cols-2 gap-5 p-4 rounded">
    <div id="resultList" class="col-span-1 overflow-auto">
        {{-- Dynamic content --}}
    </div>
    <div class="bg-honeydew col-span-1 w-full h-full rounded p-2">
        <div id="selectedLocation" class="w-full mb-2 px-2 py-4 rounded text-lg bg-gradient-to-br from-white via-gray-100 to-white bg-opacity-40 shadow text-chryslerBlue flex items-center justify-between">
            {{-- Dynamic content --}}
        </div>
        <div class="w-full flex items-center justify-between text-xl text-purple-700 mt-4 border-b-2 pr-2 pb-2 border-gray-300">
            <img src="" alt="weather icon" id="weather_icon" class="ml-10 w-32 h-32">
            <div class="h-full w-1/2" id="weather_details">
                <p>weather.main</p>
                <p>weather.temp</p>
                <p>weather.humdity</p>
                <p>weather.pressure</p>
                <p>weather.feels_like</p>
                <p>weather.sea_level</p>
                <p>waether.grnd_level</p>
            </div>
        </div>
        <div class="mt-2 w-full h-fit px-2 flex items-center justify-between overflow-hidden overflow-x-scroll" id="forecast">
            {{-- <div class="bg-celadon bg-opacity-50 border-2 p-2 border-white text-chryslerBlue w-52 h-52 rounded flex flex-col items-center justify-between">
                <p class="text-xl bg-white bg-opacity-40 rounded-full px-4 py-1">Monday</p>
                <img src="" alt="weather icon" id="weather_icon2">
                <div class="text-white w-full bg-amethyst bg-opacity-60 text-lg flex flex-col items-center justify-between rounded">
                    <p>Time</p>
                    <p>Rain - Temp C</p>
                </div>
            </div> --}}
        </div>
    </div>
</div>