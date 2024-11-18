import API_K from "../../build/keys/plantKey.js";

const plantList = document.getElementById('plant-list');
const pagination = document.getElementById('pagination');
const prev = document.getElementById('prev');
const nextP = document.getElementById('next');
const total_p = document.getElementById('total');
const current = document.getElementById('current');
// Example Javascript Component


dataPaginate();
async function dataPaginate(paGe) {
    paGe = paGe ? paGe : 1;
    plantList.innerHTML = "";
    var requestOptions = {
        method: 'get',
        redirect: 'follow'
    };
    await fetch(`https://www.perenual.com/api/species-list?key=${API_K}&page=${paGe}`, requestOptions)
        .then(response => response.json())
        .then(result => {
            const data = result.data;
            for (let plant of data) {
                let image_url = plant.default_image ? plant.default_image.regular_url : '';
                let plant_name = plant.common_name;
                let cycle = plant.cycle;
                let sunlight = plant.sunlight[0];
                let watering = plant.watering;
                let scientific_name = plant.scientific_name[0];
                // let other_name = plant.other_name[0];
                // console.log(plant.watering)
                // console.log(image_url)
                let new_div = document.createElement('div');
                new_div.className = "w-72 h-[30rem] mb-4 md:mb-0 p-4 bg-white hover:shadow-xl border-2 rounded"
                new_div.innerHTML = 
                `
                        <img src="${image_url}" alt="no image avalibale for this plant" class="h-2/5 w-full">
                        <p class="bg-honeydew px-4 py-2 mt-4 rounded w-full text-center text-amethyst text-xl">${plant_name}</p>
                        <p class="mt-2 text-md px-2">It's scientific name is ${scientific_name}.</p>
                        <div class="w-full h-fit mt-2 text-md text-chryslerBlue rounded-full px-2 flex items-center justify-between">
                            <p>Cycle</p>
                            <p>-----</p>
                            <p>${cycle}</p>
                        </div>
                        <div class="w-full h-fit mt-2 text-md text-chryslerBlue rounded-full px-2 flex items-center justify-between">
                            <p>Sunlight</p>
                            <p>-----</p>
                            <p>${sunlight}</p>
                        </div>
                        <div class="w-full h-fit mt-2 text-md text-chryslerBlue rounded-full px-2 flex items-center justify-between">
                            <p>Watering</p>
                            <p>-----</p>
                            <p>${watering}</p>
                        </div>
                `;
                plantList.appendChild(new_div);
            };

  
            // Pagination
            let current_page = result.current_page;
            let last_page = result.last_page;
            total_p.innerHTML = "";
            total_p.innerHTML = last_page + ' pages';
            current.innerHTML = "";
            current.innerHTML = current_page;
            
            nextP.addEventListener('click', async () => {
                if (current_page + 1 <= last_page) {
                    let pg = current_page + 1;
                    await dataPaginate(pg);
                }
            });

            prev.addEventListener('click', async () => {
                if (current_page - 1 >= 1) {
                    let pg = current_page - 1;
                    await dataPaginate(pg);
                }
            });
          
        })
        .catch(error => console.log('error', error));
}
  
  
