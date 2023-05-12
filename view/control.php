<!--<!DOCTYPE html>-->
<!--<html lang="fr">-->
<!--<head>-->
<!--    <meta charset="utf-8">-->
<!--    <title>Controle</title>-->
<!--    <link rel="stylesheet" href="../assets/css/control.css">-->
<!--</head>-->
<!---->
<!--<body>-->
<!--<script>-->
<!--    const options = {-->
<!--        enableHighAccuracy: true,-->
<!--        timeout: 5000,-->
<!--        maximumAge: 0-->
<!--    };-->
<!---->
<!--    function success(pos) {-->
<!--        const crd = pos.coords;-->
<!---->
<!--        console.log('Your current position is:');-->
<!--        console.log(`Latitude : ${crd.latitude}`);-->
<!--        console.log(`Longitude: ${crd.longitude}`);-->
<!--        console.log(`More or less ${crd.accuracy} meters.`);-->
<!--    }-->
<!---->
<!--    function error(err) {-->
<!--        console.warn(`ERROR(${err.code}): ${err.message}`);-->
<!--    }-->
<!---->
<!--    //navigator.geolocation.getCurrentPosition(success, error, options);-->
<!--</script>-->
<!--<script defer src="httprequest.js"></script>-->
<!--<header>-->
<!--    <section class="box-controle" >-->
<!--        <nav class="rotateArrow">-->
<!--            <a href="/Home"><img class="hover-img" src="assets/images/symbole-fleche-droite-noir.png" height="40" width="40" alt="cerclelogo"></a>-->
<!--        </nav>-->
<!--    </section>-->
<!---->
<!--    <section class="center">-->
<!--        <h1>Contrôles</h1>-->
<!--    </section>-->
<!---->
<!--    <section class="cacher-tablet">-->
<!--        <div class="carControlContainer">-->
<!---->
<!--            <img src="assets/images/voitureteslaHaut-horizontal.png" alt="voituretesla">-->
<!---->
<!--            <div class="buttonContainer">-->
<!---->
<!--                <label for="openRear" class="label-open" id="openRearLabel">-->
<!--
                       /** @var array $A_view */
                        echo $A_view["isRearTrunkOpen"] ? "Ouvrir" : "Fermer"

               </label>-->
<!---->
<!--                <button id="openRear" style="display: none" onclick="sendRequest('Openings/postActuateTrunk/rear')"></button>-->
<!---->
<!--                <img class="cadenasLock hover-img" src="assets/images/cadenaslock.png" alt="cadenasLock" onclick="sendRequest('Openings/postActuateDoor echo $A_view["isVehicleLocked"] ? "Unlock" : "Lock" ?>')

                <label for="openFront" class="label-open" id="openFrontLabel">
                      echo $A_view["isFrontTrunkOpen"] ? "Ouvrir" : "Fermer"
               </label>-->
<!--                <button id="openFront" style="display: none"  onclick="sendRequest('Openings/postActuateTrunk/front')"></button>-->
<!---->
<!--            </div>-->
<!---->
<!--        </div>-->
<!--
            echo $A_view["isCharging"] ? "<img src='assets/images/ThunderLight.png' class='eclair' alt='eclairlogo'>" : "<img src='assets/images/Thunder.png' class='eclair' alt='eclairlogo'>";
   </section>-->
<!--    <section class="cacher">-->
<!--        <section class="vertical-controle">-->
<!--            <p class="p-padding-h">Ouvrir</p>-->
<!--            <img class="voiture-controle"  src="assets/images/voitureteslaHaut-vertical.png" alt="voituretesla">-->
<!--            <img class="cadenasPos"  src="assets/images/cadenaslock.png" alt="cadenasLock">-->
<!--            <p class="p-padding-b">Ouvrir</p>-->
<!--        </section>-->
<!--        <button>-->
<!---->
<!--        </button>-->
<!--        <img src="assets/images/eclairlogo.png" class="eclair hover-img" alt="capotlogo">-->
<!--    </section>-->
<!--</header>-->
<!--<section class="bdody">-->
<!--    <menu class="horizontal border1">-->
<!---->
<!--        <li>-->
<!--            <button class="buttontype1" onclick="sendRequest('OtherControls/postFlashLights')">-->
<!--                <img class="hover-img" src="assets/images/headlight.png" height="55" width="55" alt="rondlogo">-->
<!--            </button>-->
<!--        </li>-->
<!---->
<!--        <li>-->
<!--            <button class="buttontype1" onclick="sendRequest('OtherControls/postHonkHorn')">-->
<!--                <img class="hover-img" src="assets/images/horn.png" height="55" width="55" alt="ventilationlogo">-->
<!--            </button>-->
<!--        </li>-->
<!---->
<!--        <li>-->
<!--            <button class="buttontype1" onclick="window.location.href = '';">-->
<!--                <img class="hover-img" src="assets/images/remote.png" height="55" width="55" alt="remotelogo">-->
<!--            </button>-->
<!--        </li>-->
<!---->
<!--        <li>-->
<!--            <button class="buttontype1" onclick="window.location.href = '';">-->
<!--                <img class="hover-img" src="./assets/images/ventilate.png" height="55" width="55" alt="capotlogo">-->
<!--            </button>-->
<!--        </li>-->
<!---->
<!--    </menu>-->
<!--</section>-->
<!--</body>-->
<!--</html>-->
<?php /** @var array $A_view */ ?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Tesla - Control Panel </title>
    <link rel="stylesheet" href="/assets/css/control.css">
    <script async type="text/javascript" src="/assets/js/controls.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<body>
<h2 class="centered_categorie"><a id="retour" href="/home">&lt &nbsp</a>Contrôles</h2>

<img id="car_controls" src="/assets/images/tesla_controls.png" alt="tesla-car">
<menu id="car_actions">
    <h3 id="left_open" onclick="sendRequest('Openings/postActuateTrunk/front')"><?php echo $A_view["isFrontTrunkOpen"] ? "Fermer" : "Ouvrir"?></h3>
    <img id="lock" src="/assets/images/Lock.PNG" alt="tesla_lock_icon"/>
    <h3 id="right_open" onclick="sendRequest('Openings/postActuateTrunk/rear')"><?php echo $A_view["isRearTrunkOpen"] ? "Fermer" : "Ouvrir"?></h3>


    <?php echo $A_view["isCharging"] ? "<img id='thundercharge' src='/assets/images/ThunderLight.png' class='eclair' alt='eclairlogo'/>" : "<img id='thundercharge' src='/assets/images/Thunder.png' class='eclair' alt='eclairlogo'/>";?>
</menu>

<menu id="menu_actions">
    <button id="action_button" onclick="sendRequest('OtherControls/postFlashLights')"><img src="/assets/images/Lights.PNG" width="50px" height="50px" alt="On / Off l'enregistrement"/>
    <small>Clignoter</small></button>
    <button id="action_button" onclick="sendRequest('OtherControls/postHonkHorn')"><img src="/assets/images/horn.png" width="50px" height="50px" alt="On / Off la climatisation"/>
    <small>Klaxonner</small></button>
    <button id="action_button"><img src="/assets/images/Camera.PNG" width="50px" height="50px" alt="On / Off la charge"/>
        <small>Démarrer</small></button>
    <button id="action_button"><img src="/assets/images/Window.PNG" width="50px" height="50px" alt="Ouvrir / Fermer le coffre"/>
        <small>Aérer</small></button>
</menu>
</section>

</body>
</html
