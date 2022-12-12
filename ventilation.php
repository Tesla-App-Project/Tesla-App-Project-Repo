<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Titre</title>
    <link rel="stylesheet" href="./assets/css/ventilation.scss">
</head>

<body>
  <main>
    <section class="tempBod">
      <h2 class="deleteTitle">Voiture et puissance de la ventilation</h2>
      <img src="./assets/images/teslaInt.png" class="model3Int" alt="">
      <input type="image" onclick="history.back()" class="return" alt="return" src="./assets/images/symbole-fleche-droite-noir.png">
    </section>
    <br><br>
    <section class="tempCont">
        <h2 class="deleteTitle">Allumer et modifier le chauffage</h2>
        <img src="./assets/images/barT.png" class="bar" alt="">
        <p class="TextTemp">Intérieur 26°C . Extérieur 28°C</p>
        <input type="image" onclick="" class="MarArr" alt="return" src="./assets/images/on_off.png">
        <input type="image" onclick="" class="AerFer" alt="return" src="./assets/images/ventilate.png">
        <input type="image" onclick="onClickLeftButton()" class="LeftT" alt="return" src="./assets/images/symbole-fleche-droite-noir.png">
        <input type="image" onclick="onClickRightButton()" class="RightT" alt="return" src="./assets/images/symbole-fleche-droite-noir.png">
        <p class="TempPR">22.0°</p>

        <button id="btn" onClick="changeStopButton();">Arrêt</button>
        <button id="btn2" onClick="changeVentilateButton();">Aérer</button>

        <script type="text/javascript">

            function changeStopButton() {
                const btn = document.getElementById('btn');


                btn.addEventListener('click', function handleClick() {
                    const initialText = 'Arrêt';

                    if (btn.textContent.toLowerCase().includes(initialText.toLowerCase())) {
                        btn.textContent = 'Marche';
                    } else {
                        btn.textContent = initialText;
                    }
                });
            }

            function changeVentilateButton() {
                const btn2 = document.getElementById('btn2');


                btn2.addEventListener('click', function handleClick() {
                    const initialText = 'Aérer';

                    if (btn2.textContent.toLowerCase().includes(initialText.toLowerCase())) {
                        btn2.textContent = 'Fermer';
                    } else {
                        btn2.textContent = initialText;
                    }
                });
            }

            function onClickLeftButton() {
                str = document.getElementById("number").innerHTML;
                str = str.substring(0, str.length - 2);

                if (str > 10) { str--; }

                if (str == 10) { document.getElementById("boutonGauche").innerText = "_"; }

                if (str < 30) { document.getElementById("boutonDroit").innerText = ">"; }

                document.getElementById("number").innerHTML = str + "°C"
            }

            function onClickRightButton() {
                str = document.getElementById("number").innerHTML;
                str = str.substring(0, str.length - 2);

                if (str < 30) { str++; }

                if (str == 30) { document.getElementById("boutonDroit").innerText = "_"; }

                if (str > 0) { document.getElementById("boutonGauche").innerText = "<"; }

                document.getElementById("number").innerHTML = str + "°C"
            }
        </script>
    </section>
  </main>
</body>

</html>