<div id="result" class="border border-amethyst shadow-xl w-full md:h-[35rem] mt-10 md:grid grid-cols-2 gap-5 p-4 rounded">

    {{-- Search results --}}
    <div id="resultList" class="col-span-1 overflow-auto mb-10 md:mb-0">
        {{-- Dynamic content --}}
    </div>

    {{-- Weather Info --}}
    <div class="bg-honeydew col-span-1 w-full h-full rounded p-2">
        <div id="selectedLocation" class="w-full mb-2 px-2 py-4 rounded text-lg bg-gradient-to-br from-white via-gray-100 to-white bg-opacity-40 shadow text-chryslerBlue flex items-center justify-between">
            {{-- Dynamic content --}}
        </div>

        {{-- Weather conditon details --}}
        <div class="w-full md:flex items-center justify-between text-xl text-purple-700 mt-4 border-b-2 pr-2 pb-2 border-gray-300">
            <img src="" alt="weather icon" id="weather_icon" class="ml-16 md:ml-10 w-32 h-32">
            <div class="h-full w-full md:w-1/2" id="weather_details">
            </div>
        </div>
        
        {{-- Weather Forecast --}}
        <div class="mt-2 w-full h-fit px-2 flex items-center justify-between overflow-hidden overflow-x-scroll" id="forecast">
            <div class="bg-celadon bg-opacity-50 border-2 p-2 border-white text-chryslerBlue w-52 h-52 rounded flex flex-col items-center justify-between mr-2">
                <p class="text-xl bg-white bg-opacity-40 rounded-full px-4 py-1">dayOfWeek</p>
                <img src="https://openweathermap.org/img/wn/${f_weather['icon']}@2x.png" alt="weather icon" id="weather_icon2">
                <div class="text-white w-full bg-amethyst bg-opacity-60 text-lg flex flex-col items-center justify-between rounded">
                    <p>Time am or pm</p>
                    <p>Weather - Temp &deg;C</p>
                </div>
            </div>
            {{-- Dynamic Content --}}
        </div>
    </div>
</div>