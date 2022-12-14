<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link href="./assets/css/style.scss" rel="stylesheet">
  <link href="./assets/css/planning.scss" rel="stylesheet">
  <script src="./assets/js/script.js"></script>
  <title>Planning</title>
</head>

<body>
  <header>
      <section class="header-section-control">
          <a href="./index.php"><img class="header-arrow hover-img" src="assets/images/symbole-fleche-droite-noir.png" alt="Retour"></a>
          <h1>Planning</h1>
      </section>
  </header>
  <select class="form-select" aria-label="Default select example">
    <option selected>Fuseau Horaire</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
  </select>
  <form>
  <div class="form-group time-small">
    <input type="text" id="exampleInputPassword1" class="form-control" placeholder="Début">
  </div>
    <div class="form-group time-small">
    <input type="text" id="exampleInputPassword2" class="form-control" placeholder="Fin">
  </div>
  <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
  
  <footer>
    <hr>
    <img src="./assets/images/model3-logo.png" alt="Model3 Title">
  </footer>
</body>

</html>