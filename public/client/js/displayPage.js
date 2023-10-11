import API_KEY from "../../build/keys/keys.js";

const dat = document.getElementById("myElement");
const location = dat.getAttribute("data-my-data");
const result = document.getElementById("result");
const resultList = document.getElementById("resultList");
const selectedLocation = document.getElementById('selectedLocation');
const weather_icon = document.getElementById("weather_icon");
const weather_details = document.getElementById("weather_details");
const forecast = document.getElementById("forecast");
const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

getWeatherData()
function getWeatherData() {
    fetch(`https://api.openweathermap.org/geo/1.0/direct?q=${location}&limit=30&appid=${API_KEY}`)
    .then(res => res.json())
    .then(data => {
        // Checks if there is data available for the location entered
        if (Object.keys(data).length === 0) {
            result.innerText = "";
            resultList.innerHTML = ""
            const not_found = document.createElement('div')
            not_found.innerHTML = `<div class="text-lg px-4 text-gray-600">Search result not found for ${location}.</div>`;
            result.appendChild(not_found);
            // result.nextElementSibling.classList.add("hidden");
        }
        else {
            let count = 0;
            for (let each of data) {
                const divElement = document.createElement('div');
                divElement.className ='w-full mb-2 px-2 py-4 rounded shadow bg-honeydew text-lg text-amethyst flex items-center justify-between';
    
                // checks if the name, state and country of a location is undefined
                if (each['state'] == undefined) {
                    each['state'] = "";
                }
                if (each['name'] == undefined) {
                    each['name'] = "";
                }
                if (each['country'] == undefined) {
                    each['country'] = "";
                }
    
                divElement.innerHTML = 
                `
                <p class="text-2xl font-bold">${each['name']}</p>
                <p>${each['state']}</p>
                <p>${each['country']}</p>
                `;
                resultList.appendChild(divElement);

                if (count === 0) {
                    selectedLocation.innerHTML = "";
                    selectedLocation.innerHTML = 
                    `
                    <p class="text-2xl font-bold">${each['name']}</p>
                    <p>${each['state']}</p>
                    <p>${each['country']}</p>
                    `

                    const lat = each['lat'];
                    const lon = each['lon'];

                    // Gets weather data for the first element
                    fetch(`https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${API_KEY}`)
                    .then(res => res.json())
                    .then(data2 => {
                        console.log(data2)
                        let weather = data2['weather'][0];
                        let weather_main = data2['main'];

                        weather_icon.setAttribute("src", `https://openweathermap.org/img/wn/${weather['icon']}@2x.png`);
                        weather_details.innerHTML = ""
                        weather_details.innerHTML =
                        `
                        <p class="border-b pl-2">${weather.main}: ${weather.description}</p>
                        <p class="border-b pl-2">Temperature: ${weather_main.temp} &deg;C</p>
                        <p class="border-b pl-2">Humidity: ${weather_main.humidity}%</p>
                        <p class="border-b pl-2">Pressure: ${weather_main.pressure} hPa</p>
                        <p class="border-b pl-2">Feels like: ${weather_main.feels_like} &deg;C</p>
                        <p class="border-b pl-2">Sea Level: ${weather_main.sea_level} hPa</p>
                        <p class="border-b pl-2">Ground Level: ${weather_main.grnd_level} hPa</p>
                        `;
                    })

                    // Gets weather forecast for the first location on the list
                    fetch(`https://api.openweathermap.org/data/2.5/forecast?lat=${lat}&lon=${lon}&appid=${API_KEY}`)
                    .then(res => res.json())
                    .then (data => {
                        forecast.innerHTML = "";

                        let list_in = data['list'];
                        for (let each in list_in) {
                            let list_value = list_in[each];
                            let f_weather = list_value['weather'][0];
                            let dt = list_value['dt'];
                            const f_temp = list_value['main']['temp']

                            const date = new Date(dt * 1000);
                            const dayOfWeek = days[date.getDay()];
                            const time = date.toLocaleTimeString().slice(0, -6);
                            const am_pm = date.toLocaleTimeString().slice(-2);
                            let new_div = document.createElement('div');
                            new_div.innerHTML =
                            `
                            <div class="bg-celadon bg-opacity-50 border-2 p-2 border-white text-chryslerBlue w-52 h-56 rounded flex flex-col items-center justify-between mr-2">
                                <p class="text-xl bg-white bg-opacity-40 rounded-full px-4 py-1">${dayOfWeek}</p>
                                <img src="https://openweathermap.org/img/wn/${f_weather['icon']}@2x.png" alt="weather icon" id="weather_icon2">
                                <div class="text-white w-full bg-amethyst bg-opacity-60 text-lg flex flex-col items-center justify-between rounded">
                                    <p>${time} ${am_pm}</p>
                                    <p>${f_weather['main']} - ${(f_temp - 273.15).toFixed(2)} &deg;C</p>
                                </div>
                            </div>
                            `
                            forecast.appendChild(new_div)
                        }
                    })
                }
                count += 1;
                // Adds click event to the displayed list and this their data on click
                divElement.addEventListener("click", () => {
                    selectedLocation.innerHTML = "";
                    selectedLocation.innerHTML = 
                    `
                    <p class="text-2xl font-bold">${each['name']}</p>
                    <p>${each['state']}</p>
                    <p>${each['country']}</p>
                    `

                    const lat = each['lat'];
                    const lon = each['lon'];

                    // Gets weather data for the first element
                    fetch(`https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${API_KEY}`)
                    .then(res => res.json())
                    .then(data2 => {
                        console.log(data2)
                        let weather = data2['weather'][0];
                        let weather_main = data2['main'];

                        weather_icon.setAttribute("src", `https://openweathermap.org/img/wn/${weather['icon']}@2x.png`);
                        weather_details.innerHTML = ""
                        weather_details.innerHTML =
                        `
                        <p class="border-b pl-2">${weather.main}: ${weather.description}</p>
                        <p class="border-b pl-2">Temperature: ${weather_main.temp} &deg;C</p>
                        <p class="border-b pl-2">Humidity: ${weather_main.humidity}%</p>
                        <p class="border-b pl-2">Pressure: ${weather_main.pressure} hPa</p>
                        <p class="border-b pl-2">Feels like: ${weather_main.feels_like} &deg;C</p>
                        <p class="border-b pl-2">Sea Level: ${weather_main.sea_level} hPa</p>
                        <p class="border-b pl-2">Ground Level: ${weather_main.grnd_level} hPa</p>
                        `;
                    })

                    // Gets weather forecast for the first location on the list
                    fetch(`https://api.openweathermap.org/data/2.5/forecast?lat=${lat}&lon=${lon}&appid=${API_KEY}`)
                    .then(res => res.json())
                    .then (data => {
                        forecast.innerHTML = "";

                        let list_in = data['list'];
                        for (let each in list_in) {
                            let list_value = list_in[each];
                            let f_weather = list_value['weather'][0];
                            let dt = list_value['dt'];
                            const f_temp = list_value['main']['temp']

                            const date = new Date(dt * 1000);
                            const dayOfWeek = days[date.getDay()];
                            const time = date.toLocaleTimeString().slice(0, -6);
                            const am_pm = date.toLocaleTimeString().slice(-2);
                            let new_div = document.createElement('div');
                            new_div.innerHTML =
                            `
                            <div class="bg-celadon bg-opacity-50 border-2 p-2 border-white text-chryslerBlue w-52 h-56 rounded flex flex-col items-center justify-between mr-2">
                                <p class="text-xl bg-white bg-opacity-40 rounded-full px-4 py-1">${dayOfWeek}</p>
                                <img src="https://openweathermap.org/img/wn/${f_weather['icon']}@2x.png" alt="weather icon" id="weather_icon2">
                                <div class="text-white w-full bg-amethyst bg-opacity-60 text-lg flex flex-col items-center justify-between rounded">
                                    <p>${time} ${am_pm}</p>
                                    <p>${f_weather['main']} - ${(f_temp - 273.15).toFixed(2)} &deg;C</p>
                                </div>
                            </div>
                            `
                            forecast.appendChild(new_div)
                        }
                    })
                });
            }
        }
     })
}