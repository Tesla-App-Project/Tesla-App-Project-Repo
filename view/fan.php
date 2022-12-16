<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Ventilation</title>
<!--     <link rel="stylesheet" href="./assets/css/fan.scss"> -->
    <link rel="stylesheet" href="./assets/css/fan.css">
</head>

<body>
  <main>
    <section class="tempBod">
      <h2 class="deleteTitle">Voiture et puissance de la ventilation</h2>
      
      <section class="heat-button">
        <img src="./assets/images/seat-heat/no_heat.png" id="img-seat-heat-l" onclick="onClickChangeImage()" alt="">
        <small>Auto</small>
        <img src="./assets/images/seat-heat/no_heat.png" id="img-seat-heat-r" onclick="onClickChangeImage2()" alt="">
        <small>Auto</small>
      </section>
      
      <img src="./assets/images/interior_view_tesla.png" class="model3Int" alt="">
      <input type="image" onclick="history.back()" class="return hover-img" alt="return" src="./assets/images/symbole-fleche-droite-noir.png">
      
    </section>
    <br><br>
    <section class="tempCont">
        <h2 class="deleteTitle">Allumer et modifier le chauffage</h2>
        <img src="./assets/images/bar.png" class="bar" alt="">
        <p class="TextTemp">Intérieur 26°C . Extérieur 28°C</p>
        <input type="image" onclick="" class="MarArr hover-img" alt="return" src="./assets/images/on_off.png">
        <input type="image" onclick="" class="AerFer hover-img" alt="return" src="./assets/images/ventilate.png">
        <input type="image" id="boutonGauche" onclick="onClickLeftButton()" class="LeftT hover-img" alt="return"                             src="./assets/images/symbole-fleche-droite-noir.png">
        <input type="image" id="boutonDroit" onclick="onClickRightButton()" class="RightT hover-img" alt="return"                            src="./assets/images/symbole-fleche-droite-noir.png">
        <p id="number" class="TempPR">22°C</p>

        <button id="btn" onClick="changeStopButton();">Arrêt</button>
        <button id="btn2" onClick="changeVentilateButton();">Aérer</button>
    </section>
        <script src="./assets/js/fan.js"></script>
  </main>
</body>

</html>