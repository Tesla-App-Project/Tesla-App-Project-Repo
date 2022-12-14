<!doctype html>
<html lang="fr">
<head>
  <meta charset = "utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link href="./assets/css/style.scss" rel="stylesheet">

  <title> Statistiques </title>
</head>
<body>
    <header>
        <nav>
            <a href="index.php"><img src="./assets/images/retour.png" alt="icone user"></a>
        </nav>
        <h1>Statistiques de recharge</h1>
    </header>


    <section id="graphique">
        <section id="stat">
            <h2>Dépenses et recharge total</h2>
            <h3 class="titre-3">31 derniers jours</h3>
            <section class="jours">
                <h4 class="titre-4">Total recharge</h4>
                <p class="sup"><span class>24</span> kWh</p>
            </section>
            <section class="jours">
                <h4 class="titre-4">Dépenses totales</h4>
                <p class="sup"><span>4 €</span></p>
            </section>
        </section>
        <h2>Graphique statistique de recharge</h2>
        <p class="graph"><img class="simone_img" src="./assets/images/graphique.png" alt="image graphique"></p>
        <section id="infos-stats">
            <h2>Navigation options de la voiture</h2>
            <nav>
                <ul class="infos-stats">
                    <li class="infos">
                        <img class="icones" src="./assets/images/home.png" alt="icone ventilation">
                        <a href="#">
                            <h3>100%</h3>
                            <p>Domicile</p>
                        </a>
                    </li>
                    <li class="infos">
                        <img class="icones" src="./assets/images/work.png" alt="icone position">
                        <a href="#">
                            <h3>0%</h3>
                            <p >Lieu de travail</p>
                        </a>
                    </li>
                    <li class="infos">
                        <img class="icones" src="./assets/images/charge.png" alt="icone ventilation">
                        <a href="#">
                            <h3>0%</h3>
                            <p>Superchargeur</p>
                        </a>
                    </li>
                    <li class="infos">
                        <img class="icones" src="./assets/images/autre.png" alt="icone position">
                        <a href="#">
                            <h3>0%</h3>
                            <p>Autre</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </section>
    </section>
<section id="blocs">
    <section id="bloc1">
        <h2>Bloc économies</h2>
        <a href="#">
            <a href="#" class="blocs"><h3>Economies de carburant</h3></a>
            <p>Rechargez jusqu'à au moins 75 kWh pour visualiser une estimation de vos économies de carburant.</p>
        </a>
    </section>
    <section id="bloc2">
        <h2>Bloc coût</h2>
            <a href="#" class="blocs">
                <h3>Coût Moyen</h3>
            </a>
        <small>Par kWh</small>
        <p>
          <h4>Domicile</h4>
          <span><meter class="meter2" min="0" max="100" value="100"></meter> 0,17 €</span>
        </p>
        <p>
            <h4>Superchargeur</h4>
            <small>0,00 €</small>
        </p>
        <p>
            <h4>Lieu de travail</h4>
            <small>0,00 €</small>
        </p>
        <p>
            <h4>Autre</h4>
            <small>0,00 €</small>
        </p>
    </section>
    <section id="nav">
        <h2>Navigation options de la voiture</h2>
        <nav>
            <ul>
                <li>
                    <img class="icones" src="./assets/images/controle.png" alt="icone contrôle">
                    <a href="#"><h3>Paramètres</h3></a>
                    <img class="icones fleche" src="./assets/images/suivant.png" alt="controles">
                </li>
            </ul>
        </nav>
        <p>L'affichage de la devise se fait en fonction de la langue (français) et du pays[FR] de votre téléphone</p>
    </section>
</section>

<?php
  $date = new DateTime("2012-07-05 16:43:21", new DateTimeZone('Europe/Paris'));
  
  date_default_timezone_set('America/New_York');
  
  echo $date->format('d/m/Y H:i:s');
?>

</body>
</html>