import API_KEY from "../../build/keys/keys.js";

const day = document.getElementById('day');
const place = document.getElementById('place');
const weather = document.getElementById('weather');
const temperature = document.getElementById('temp');
const weather_icon = document.getElementById('weather_icon');
const extraData = document.getElementById('extraData');
const delete_search = document.getElementById('delete');
const clearHistory = document.getElementById('clearHistory');

const sHistory = document.getElementById('Shistory');
const W_info = document.getElementById('W_info');

const navBar = document.getElementsByClassName('nav');

// history2 is used instead of history to avoid global variable conflict
const [info, history2] = navBar;

// Displays search history
history2.addEventListener('click', () => {
    sHistory.classList.remove('hidden');
    sHistory.classList.add('block');
    W_info.classList.remove('grid');

    W_info.classList.add('hidden');
});

// Displays current weather details
info.addEventListener('click', () => {
    sHistory.classList.remove('block');
    sHistory.classList.add('hidden');
    W_info.classList.remove('hidden');
    console.log('hey')
    W_info.classList.add('grid');
});

// Removes a deleted search history
if (delete_search) {
    delete_search.addEventListener('click', () => {
        delete_search.parentNode.classList.remove('flex');
        delete_search.parentNode.classList.add('hidden');
    })
}

// Removes the search history when the history is empty
if (clearHistory) {
    clearHistory.addEventListener('click', () => {
        sHistory.classList.remove('block');
        sHistory.classList.add('hidden');
    })
}

function updateTime() {
    let currentDate = new Date();
    let date = currentDate.toDateString();
    let hours = currentDate.getHours().toString();
    let mins = currentDate.getMinutes().toString();
    const am_pm = currentDate.toLocaleTimeString().slice(-2);
    const Day = `${hours}:${mins}${am_pm} - ${date}`;
    day.innerHTML = Day;
}
setInterval(updateTime(), 1000);

// Check if the Geolocation API is available in the user's browser
getCordinate();
function getCordinate() {
    if ("geolocation" in navigator) {
        // Get the user's current position
            navigator.geolocation.getCurrentPosition(function(position) {
                // Get the latitude and longitude coordinates
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                // Get weather data
                fetch(`https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=${API_KEY}`)
                // convert the data to JSON
                .then(res => res.json())
                // use the data to update the html page
                .then(data => {
                    const placeName = data.name;
                    const currentWeather = data.weather[0].main;
                    const raw_temp = data.main.temp
                    const w_icon = data.weather[0].icon;
                    const symBols = {
                        humidity: '%',
                        pressure: 'hPa',
                        sea_level: 'hPa',
                        grnd_level: 'hPa'
                    }
                    
                    Object.entries(data.main).forEach(([key, value]) => {
                        if (key == 'temp' || key == 'temp_min' || key == 'temp_max') {
                            // continue;
                        }
                        else if(key == 'feels_like') {
                            value = (value - 273.15).toFixed(0);
                            let new_div = document.createElement('div');
                            new_div.innerHTML = `<div class="mb-2 w-full flex items-center justify-between">
                            <p>${key}</p>
                            <p>${value}&deg;</p></div>`;

                            extraData.appendChild(new_div);
                        }
                        else{
                            let new_div = document.createElement('div');
                            new_div.innerHTML = `<div class="mb-2 w-full flex items-center justify-between">
                            <p>${key}</p>
                            <p>${value} ${symBols[key]}</p></div>`;

                        extraData.appendChild(new_div);
                        }
                        
                    })
                    // for (const key, value) in data.main

                    place.innerHTML = placeName;
                    weather.innerHTML = currentWeather;
                    temperature.innerHTML = `${(raw_temp - 273.15).toFixed(0)}&deg;`;
                    weather_icon.setAttribute('src', `https://openweathermap.org/img/wn/${w_icon}@2x.png`)
                })
            });
    } else {
        console.log("Geolocation is not available in this browser.");
    }
}
