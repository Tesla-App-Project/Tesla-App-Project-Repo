<?php
echo '<header class="menu sticky">
  <h1>Simone</h1>
  <nav>
    <a href="#"><img src="../assets/images/user.png" alt="icone user"></a>
  </nav>
</header>
<section class="fixed">
  <section class="flex_batterie">
    <meter class="meter" min="0" max="100" value="50"></meter>
    <p>71%</p>
  </section>
  <p>Stationnée</p>
</section>
<div class="bloc-gauche">

  <section class="fixed">
    <h2>Bloc Principal Image et Bouton</h2>
    <section class="bloc-voiture">
      <h2>Image de la voiture</h2>
      <p class="simone"><img id="simone" class="simone-img" src="../assets/images/voiture.png" alt="image voiture"></p>
    </section>

    <!-- Panneau Electricite -->
    <section class="Abs_Elec" id="Elec_Aff" hidden>
      <p id="limiteCharge">Limite charge: 100%</p>
      <progress min="0" max="100" value="71" width="50%"></progress>
      <p id="kWh">24 kWh ajoutés durant la dernière recharge</p>
      <section class="Bord_Ampere">
        <button id="LeftButton" onclick="LeftButtonOnClick()"
                style="color: gray;background-color: #333333;margin: 0;">
          < </button>
        <p id="number">16 A</p>
        <button id="RightButton" onclick="RightButtonOnClick()"
                style="color: gray;background-color: #333333;margin: 0;">_</button>
      </section>
    </section>
  </section>

  <section>
    <section class="button-icone">
      <h2>Icônes contrôles de la voiture</h2>
      <button onclick="ConnexionOnClick()"><img id="ConnexionButton" srcset="../assets/images/Connexion.png"
                                                alt="icone connexion"></button>
      <a href="climate/postToggleConditioningState"><button onclick="FanOnClick()"><img id="FanButton" srcset="../assets/images/Fan.png"
                                          alt="icone ventilation"></button></a>
      <button onclick="ElecOnClick()"><img id="ElecBouton" srcset="../assets/images/Thunder.png"
                                           alt="icone energie"></button>
      <button><img srcset="../assets/images/coffre.png" alt="icone coffre"></button>
    </section>
  </section>
</div>

<section class="nav scroll">
  <h2>Navigation des options de la voiture</h2>
  <nav>
    <ul>
      <!-- Contrôles -->
      <li>
        <button class="Flex_Button">
          <section class="Flex_Cadre">
            <img src="../assets/images/controle.png" height="28%" width="28%">
            <a href="/control.php">
              <h3>Contrôles</h3>
            </a>
          </section>
          <img class="button-arrow" src="../assets/images/suivant.png" height="25px">
        </button>
      </li>

      <!-- Ventilation -->
      <li>
        <button class="Flex_Button">
          <section class="Flex_Cadre">
            <img src="../assets/images/Fan.png" height="28%" width="28%">
            <a href="ventilation.php">
              <h3>Ventilation</h3>
              <section style="display: flex; justify-content: start; align-items: center;">
                <p id="OnText" style="color: #FFFFFF;" hidden>Active </p>
                <p id="InText">Interieur 23°C</p>
              </section>
            </a>
          </section>
          <img class="button-arrow" src="../assets/images/suivant.png" height="25px">
        </button>
      </li>

      <!-- Position -->
      <li>
        <button class="Flex_Button">
          <section class="Flex_Cadre">
            <img src="../assets/images/position.png" height="28%" width="28%">
            <a href="position.php">
              <h3>Position</h3>
              <p>13 Rue Paul Guigou</p>
            </a>
          </section>
          <img class="button-arrow" src="../assets/images/suivant.png" height="25px">
        </button>
      </li>

      <!-- Planifier -->
      <li>
        <button class="Flex_Button">
          <section class="Flex_Cadre">
            <img src="../assets/images/planifier.png" height="28%" width="28%">
            <a href="#">
              <h3>Planifier</h3>
            </a>
          </section>
          <img class="button-arrow" src="../assets/images/suivant.png" height="25px">
        </button>
      </li>

      <!-- Sécurité et conducteurs -->
      <li>
        <button class="Flex_Button">
          <section class="Flex_Cadre">
            <img src="../assets/images/securite.png" height="28%" width="28%">
            <a href="#">
              <h3>Sécurité et conducteurs</h3>
              <section style="display: flex; justify-content: start; align-items: center;">
                <img id="littleRedConnexion" srcset="../assets/images/ConnexionRed.png" style="width: 20px;" hidden>
                <p>iMoi - Connectée</p>
              </section>
            </a>
          </section>
          <img class="button-arrow" src="../assets/images/suivant.png" height="25px">
        </button>
      </li>

      <!-- Stats recharge -->
      <li>
        <button class="Flex_Button">
          <section class="Flex_Cadre">
            <img src="../assets/images/statsrecharge.png" height="28%" width="28%">
            <a href="stats_reload.php">
              <h3>Stats recharge</h3>
            </a>
          </section>
          <img class="button-arrow" src="../assets/images/suivant.png" height="25px">
        </button>
      </li>

      <!-- Mises à niveau -->
      <li>
        <button class="Flex_Button">
          <section class="Flex_Cadre">
            <img src="../assets/images/miseaniveau.png" height="28%" width="28%">
            <a href="#">
              <h3>Mise à niveau</h3>
            </a>
          </section>
          <img class="button-arrow" src="../assets/images/suivant.png" height="25px">
        </button>
      </li>

      <!-- Service -->
      <li>
        <button class="Flex_Button">
          <section class="Flex_Cadre">
            <img src="../assets/images/service.png" height="28%" width="28%">
            <a href="#">
              <h3>Service</h3>
            </a>
          </section>
          <img class="button-arrow" src="../assets/images/suivant.png" height="25px">
        </button>
      </li>

    </ul>
  </nav>
</section>

<footer>
  <hr>
  <img src="../assets/images/model3-logo.png" alt="Model3 Title">
</footer>';