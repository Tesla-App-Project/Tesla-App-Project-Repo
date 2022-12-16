import InputDetect from "../model_client/client_model";

// Récupère tous les composants boutons et liens sous forme de tableau
let boutons = document.querySelectorAll("button, a");

// tout les composants boutons et liens 

boutons.forEach(bouton => {

    let testdata = Object.keys(bouton.dataset).length==0;
    // si data pas vide
    if(!testdata){
        bouton.addEventListener('click', async () => {

            let data = bouton.dataset.action;
            const res = await InputDetect.GetDataFromServer(data);
            
            if (typeof(res)=="object"){
                document.getElementById('charge').innerHTML = "Niveau de charge : " + res.response.battery_level + "%";
            }
            else{
                console.log("erreur !")
            }
        });
    }
});