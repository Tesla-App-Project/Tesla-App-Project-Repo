import InputDetect from "../model_client/client_model";
import ConnexionOnClick from "../assets/js/accueil_functions";
import FanOnClick from "../assets/js/accueil_functions";

let data = document.getElementById('charge_battery').dataset.action;
var json = await InputDetect.GetDataFromServer(data);
document.getElementById("charge_level").value = json.response.battery_level;
document.getElementById('charge_battery').innerHTML = json.response.battery_level + "%";



// Récupère tous les composants boutons et liens sous forme de tableau
let boutons = document.querySelectorAll("button, a");

// tout les composants boutons et liens
boutons.forEach(bouton => {

    let testdata = Object.keys(bouton.dataset).length==0;
    // si data pas vide
    if(!testdata){
        bouton.addEventListener('click', async () => {

            let data = bouton.dataset.action;
            json = await InputDetect.GetDataFromServer(data);
            
            if (typeof(json)=="object"){
                //document.getElementById('charge').innerHTML = "Niveau de charge : " + json.response.battery_level + "%";
                if(data=="wake_up"){
                    if(json[0].state="online"){
                        ConnexionOnClick();
                    }
                }
                else if(data=="auto_conditioning_start"){
                    if(json.response.result == "true"){
                        FanOnClick();
                    }
                }
            }
            else{
                console.log("erreur !")
            }
        });
    }
});