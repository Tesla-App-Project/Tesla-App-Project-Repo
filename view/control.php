<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Controle</title>
  <link rel="stylesheet" href="../assets/css/control.css">
</head>
  
<body>
<script>

    function sendRequest(url){
        const req = new XMLHttpRequest()
        req.open("GET", url)
        req.setRequestHeader("Accept", "application/json")
        req.setRequestHeader("Content-Type", "application/json")

        req.onreadystatechange = () => {
            if(req.readyState === 4) {
                const res = JSON.parse(req.responseText)
                if(res.result){
                    return window.alert(`Action : ${req.responseURL} réalisé avec succes`)
                }
                return window.alert(`error`)
            }
        }

        req.send()

    }
</script>
  <header>
    <section class="box-controle" >
        <nav class="rotateArrow" class="one-controle">
            <a href="index.php"><img class="hover-img" src="assets/images/symbole-fleche-droite-noir.png" height="40" width="40" alt="cerclelogo"></a>
        </nav>
    </section>
    
    <section class="center">
        <h1>Contrôles</h1>
    </section>

    <section class="cacher-tablet">
        <section class="horizontal-controle">
            <p class="p-padding-l">Ouvrir</p>
            <button onclick="sendRequest('http://localhost:8080/index.php?url=DevTest/control_doors')" >
                <img class="voiture-controle" src="assets/images/voitureteslaHaut-horizontal.png" alt="voituretesla">
            </button>
            <img class="cadenasPos hover-img"  src="assets/images/cadenaslock.png" alt="cadenasLock">
            <p class="p-padding-r">Ouvrir</p>
        </section>
        <?php
            $A_view["ischarging"] ? $chargeIcon = "<img src='assets/images/ThunderLight.png' class='eclair' alt='eclairlogo'>" : $chargeIcon = "<img src='assets/images/Thunder.png' class='eclair' alt='eclairlogo'>";
            echo $chargeIcon;
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
              <button class="buttontype1" onclick="sendRequest('http://localhost:8080/index.php?url=DevTest/flash_light')">
                <img class="hover-img" src="assets/images/headlight.png" height="55" width="55" alt="rondlogo">
              </button>
            </li>
                
            <li>
              <button class="buttontype1" onclick="sendRequest('http://localhost:8080/index.php?url=DevTest/honk_horn')">
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
