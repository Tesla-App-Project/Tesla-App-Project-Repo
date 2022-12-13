import InputDetect from "../model_client/input_detect";
import CarInformation from "../model_client/car_information";
let car_information = new CarInformation();

let nom_voiture = car_information.GetCarInformation().response[0].display_name; 

document.getElementById("nom_voiture").innerHTML = nom_voiture;

// Récupère tous les composants boutons et liens sous forme de tableau
let boutons = document.querySelectorAll("button, a");

// tout les composants boutons et liens 

boutons.forEach(bouton => {

    let testdata = Object.keys(bouton.dataset).length==0;
    // si data pas vide
    if(!testdata){
        bouton.addEventListener('click', () => {
            let data = bouton.dataset.action;
            let api_function = InputDetect.ACTION_TESLA[data];
            let json = InputDetect.GetDataFromServer(api_function);
        });
    }
});