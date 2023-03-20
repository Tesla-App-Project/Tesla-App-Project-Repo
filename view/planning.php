<!doctype html>
<html lang="fr">
<?php
require_once "config.php";
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!--   <link href="./assets/css/style.scss" rel="stylesheet"> -->
    <link href="./assets/css/base.css" rel="stylesheet">
    <!--   <link href="./assets/css/planning.scss" rel="stylesheet"> -->
    <link href="./assets/css/planning.css" rel="stylesheet">
    <script src="./assets/js/script.js"></script>
    <title>Planning</title>
</head>

<body>
<header>
    <section class="header-section-control">
        <a href="./index.php"><img class="header-arrow hover-img" src="assets/images/symbole-fleche-droite-noir.png" alt="Retour"></a>
        <h1>Planifier</h1>
    </section>
</header>

<?php
$api_key = ABSTRACT_API_KEY;
$ch = curl_init();

// Set the URL that you want to GET by using the CURLOPT_URL option.
curl_setopt($ch, CURLOPT_URL, 'https://ipgeolocation.abstractapi.com/v1/?api_key=ba6c679ade9849a1b16a401fc2b5ab1b');

// Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

// Execute the request.
$data = curl_exec($ch);

// Close the cURL handle.
curl_close($ch);

// Display API elements

$O_newObj = json_decode($data);
$city = $O_newObj->city;
$timeZoneGeo = $O_newObj->timezone->name;

$listTimeZones = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="m-2 mt-3 h2_horaire">Votre localisation </h2>
            <select class="form-select" aria-label="Default select example">
                <?php
                echo '<option value=" '.$timeZoneGeo.'" selected = "selected">'.$timeZoneGeo.'</option>';

                foreach ($listTimeZones as $timeZones) {

                    echo '<option value=" '.$timeZones.'">'.$timeZones.'</option>';

                }
                ?>
            </select>
        </div>
        <div class="col-12">
            <h2 class="m-2 mt-3 h2_horaire">Plannification </h2>
            <form>

                <div class="form-group time-small">
                    <input type="time" id="exampleInputPassword1" class="form-control" value="00:00">
                </div>
                <div class="form-group time-small">
                    <input type="time" id="exampleInputPassword2" class="form-control" value="22:00">
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>

            </form>
        </div>
    </div>
</div>

<h2 class="m-2 mt-3 h2_horaire">Vos horaires</h2>
<form class="mt-3">

    <div id="app-cover">
        <div class="row">
            <div class="toggle-button-cover">
                <div class="button-cover">
                    <div class="button r" id="button-3">
                        <input type="checkbox" class="checkbox" />
                        <div class="knobs"></div>
                        <div class="layer"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group time-small">
        <input type="time" id="exampleInputPassword1" class="form-control" value="15:30" disabled>
    </div>
    <div class="form-group time-small">
        <input type="time" id="exampleInputPassword2" class="form-control" value="23:15" disabled>
    </div>
    <button type="submit" class="btn btn-danger">Supprimer</button>

</form>
<?php
//$date = new DateTime(date("Y-m-d H:i:s"), new DateTimeZone('Europe/Paris'));
//echo "france". "". date("Y-m-d H:i:s")."<br>";

// date_default_timezone_set('America/New_York');
//echo date("Y-m-d h:iA", $date->format('U'));
?>

<footer>
    <hr>
    <img src="./assets/images/model3-logo.png" alt="Model3 Title">
</footer>
</body>

</html>