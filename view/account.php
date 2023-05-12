<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/Boostrap/bootstrap.css">
    <link rel="stylesheet" href="assets/css/Boostrap/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/account.css">
    <meta name="viewport" content="width=device-width, target-densitydpi=dpi, initial-scale=1" />
    <script src="https://kit.fontawesome.com/b368ec75de.js" crossorigin="anonymous"></script>
    <title> Mon compte </title>
    <script>
        //if("serviceWorker" in navigator) {
        //    navigator.serviceWorker.register("service-worker.js")
        //        .then(registration => {
        //            console.log("Service Worker Registered");
        //        })
        //        .catch(err => {
        //            console.log("Service Worker Failed to Register", err);
        //        })
        //}
    </script>
</head>


<body style="overflow: hidden">
<?php
/** @var array $A_view */
?>
<section id="header" style="width: 100%; height: 8%">
    <a href="/home" class="h3-profile" style="margin: 2vh 0 0 5vh; text-decoration: none">Accueil </a>
    <h3 class="h3-profile" style="margin: 2vh 0 0 5vh">Mon profil Tesla</h3>
</section>
<hr>
<section id="container-middle" style="display: flex; height: 80%; width: 100%;">
    <div id="left" style="display: flex; width: 50%; border-right: 2px solid #0087ca">
        <div style="display: flex; flex-direction: column; margin: auto">
            <img src="https://cdn-icons-png.flaticon.com/512/20/20863.png" alt="Photo de profil" width="250px" height="250px" style="border-radius: 10px; margin: 2vh auto 6vh auto ; background-color: white">
            <div id="infos-container" style="margin-bottom: 50%; display: flex; flex-direction: column">
                <h3 class="h3-profile" style="margin-bottom: 3vh">Mes informations personnelles</h3>
                <span>Nom :</span>
                <input type="text" class="profile-input" value="<?php echo ucfirst($A_view[0][0]["lastname"])?>">
                <span>Prénom :</span>
                <input type="text" class="profile-input" value="<?php echo ucfirst($A_view[0][0]["firstname"])?>">
                <span>Nom d'utilisateur :</span>
                <input type="text" class="profile-input" value="<?php echo ucfirst($A_view[0][0]["username"])?>">
                <span>Adresse mail :</span>
                <input type="email" class="profile-input" value="<?php echo ucfirst($A_view[0][0]["email"])?>">
            </div>
        </div>
    </div>

    <div id="right" style="display: flex; flex-direction: column; width: 50%;">
<!--        --><?php //var_dump($A_view); ?>
        <h3 class="h3-profile" style="width: fit-content; height: fit-content; margin: 2vh 0 0 5vh">Mes véhicules :</h3>
        <div id="car-container" style="width: 90%; height: 80%; margin: auto; border-radius: 15px">
            <ol class="gradient-list" style="width: 100%; height: 95%; overflow: hidden scroll">
                <?php foreach ($A_view[1] as $vehicule) {
                    echo '<li style="margin: 25px auto 0 auto;">
                    <img src="/assets/images/voiture.png" alt="vehicule tesla" style="transform: scale(1.2)">
                    <div style="width: 50%; margin-left: 4vh">
                        <span style="color: white; text-align: initial; font-size: xx-large; display: block">' . $vehicule["name"] . '</span>
                        <section style="display: flex; align-items: start">
                            <div class="progress-bar" >
                                <div class="progress" style="width: 75%"></div>
                            </div>
                            75%
                        </section>
                        <span class="car-infos">Localisation du véhicule :</span>
                        <span class="car-infos">[ADRESSE]</span>
                    </div>
                </li>';
                } ?>
                <li style="margin: 45px auto 0 auto;">
                    <img src="/assets/images/voiture.png" alt="vehicule tesla" style="transform: scale(1.2)">
                    <div style="width: 50%; margin-left: 4vh">
                        <span style="color: white; text-align: initial; font-size: xx-large; display: block">Véhicule de test</span>
                        <section style="display: flex; align-items: start">
                            <div class="progress-bar">
                                <div class="progress" style="width: 43%;"></div>
                            </div>
                            43%
                        </section>
                        <span class="car-infos">Localisation du véhicule :</span>
                        <span class="car-infos">3 rue des potiers, 75000 Paris</span>
                    </div>
                </li>
<!--                <li style="margin: 45px auto 25px auto;">-->
<!--                    <img src="/assets/images/voiture1.png" alt="vehicule tesla" style="transform: scale(1.2)">-->
<!--                    <div style="width: 50%; margin-left: 4vh">-->
<!--                        <h4 style="color: white; text-align: initial;">Simone 3</h4>-->
<!--                        <section style="display: flex; align-items: start">-->
<!--                            <div class="progress-bar" >-->
<!--                                <div class="progress"></div>-->
<!--                            </div>-->
<!--                            50%-->
<!--                        </section>-->
<!--                        <span class="car-infos">Localisation du véhicule :</span>-->
<!--                        <span class="car-infos">3 rue des potiers, 75000 Paris</span>-->
<!--                    </div>-->
<!--                </li>-->
            </ol>
        </div>
    </div>
</section>
<hr id="end-hr">
</body>
</html>
