<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Controle</title>
    <link rel="stylesheet" href="../assets/css/control.css">
</head>

<body>
<script defer src="httprequest.js"></script>
<header>
    <section class="box-controle" >
        <nav class="rotateArrow">
            <a href="/Home"><img class="hover-img" src="assets/images/symbole-fleche-droite-noir.png" height="40" width="40" alt="cerclelogo"></a>
        </nav>
    </section>

    <section class="center">
        <h1>Contrôles</h1>
    </section>

    <section class="cacher-tablet">
        <div class="carControlContainer">

            <img src="assets/images/voitureteslaHaut-horizontal.png" alt="voituretesla">

            <div class="buttonContainer">

                <label for="openRear" class="label-open" id="openRearLabel">
                    <?php
                        /** @var array $A_view */
                        echo $A_view["isRearTrunkOpen"] ? "Ouvrir" : "Fermer"
                    ?>
                </label>

                <button id="openRear" style="display: none" onclick="sendRequest('http://<?php echo $A_view['servAdresse'] ?>/index.php?url=Openings/postActuateTrunk/rear')"></button>

                <img class="cadenasLock hover-img" src="assets/images/cadenaslock.png" alt="cadenasLock" onclick="sendRequest('http://<?php echo $A_view['servAdresse'] ?>/index.php?url=Openings/postActuateDoor<?php echo $A_view["isVehicleLocked"] ? "Unlock" : "Lock" ?>')">

                <label for="openFront" class="label-open" id="openFrontLabel">
                    <?php
                        echo $A_view["isFrontTrunkOpen"] ? "Ouvrir" : "Fermer"
                    ?>
                </label>
                <button id="openFront" style="display: none"  onclick="sendRequest('http://<?php echo $A_view['servAdresse'] ?>/index.php?url=Openings/postActuateTrunk/front')"></button>

            </div>

        </div>
        <?php
            echo $A_view["isCharging"] ? "<img src='assets/images/Thunder.png' class='eclair' alt='eclairlogo'>" : "<img src='assets/images/ThunderLight.png' class='eclair' alt='eclairlogo'>";
        ?>
    </section>
    <section class="cacher">
        <section class="vertical-controle">
            <p class="p-padding-h">Ouvrir</p>
            <img class="voiture-controle"  src="assets/images/voitureteslaHaut-vertical.png" alt="voituretesla">
            <img class="cadenasPos"  src="assets/images/cadenaslock.png" alt="cadenasLock">
            <p class="p-padding-b">Ouvrir</p>
        </section>
        <button>

        </button>
        <img src="assets/images/eclairlogo.png" class="eclair hover-img" alt="capotlogo">
    </section>
</header>
<section class="bdody">
    <menu class="horizontal border1">

        <li>
            <button class="buttontype1" onclick="sendRequest('http://<?php echo $A_view['servAdresse'] ?>/index.php?url=OtherControls/postFlashLights')">
                <img class="hover-img" src="assets/images/headlight.png" height="55" width="55" alt="rondlogo">
            </button>
        </li>

        <li>
            <button class="buttontype1" onclick="sendRequest('http://<?php echo $A_view['servAdresse'] ?>/index.php?url=DevTest/honk_horn')">
                <img class="hover-img" src="assets/images/horn.png" height="55" width="55" alt="ventilationlogo">
            </button>
        </li>

        <li>
            <button class="buttontype1" onclick="window.location.href = '';">
                <img class="hover-img" src="assets/images/remote.png" height="55" width="55" alt="remotelogo">
            </button>
        </li>

        <li>
            <button class="buttontype1" onclick="window.location.href = '';">
                <img class="hover-img" src="./assets/images/ventilate.png" height="55" width="55" alt="capotlogo">
            </button>
        </li>

    </menu>
</section>
</body>
</html>
