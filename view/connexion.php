<!doctype html>
<html lang="fr">
<head>
  <meta charset = "utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link href="./assets/css/connexion.css" rel="stylesheet">
  <title> Connexion </title>
</head>
<body>
<!--       <section class="center">
        <h1> Connexion / Inscription </h1>
    </section> -->
<?php

if(isset($_GET['error'])){
    if($_GET['error'] === "badlogin"){
        echo "<div class='alert alert-danger' role='alert'>
                Identifiant ou mot de passe incorrect
              </div>";
    }
}

?>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
			<h1>S'inscrire</h1>
			<input type="text" placeholder="Identifiant" name="user_username" required>
			<input type="text" placeholder="Nom" name="user_last_name" required>
			<input type="text" placeholder="Prénom" name="user_first_name" required>
            <input type="email" placeholder="Email" name="user_mail" required>
			<input type="password" placeholder="Mot de passe" name="user_password" required>
			<button type="submit">S'inscrire</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#">
			<h1>Se connecter</h1>
			<input type="email" placeholder="Email" name="user_mail" required>
			<input type="password" placeholder="Mot de passe" name="user_password" required>
			<a href="#">Mot de passe oublié ?</a>
			<button>Se connecter</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>De retour ?</h1>
				<p>Si tu possède déja un compte, connecte toi !</p>
				<button class="ghost" id="signIn">Se connecter</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Salut l'ami !</h1>
				<p>Si tu ne possède pas de compte, inscrit toi !</p>
				<button class="ghost" id="signUp">S'inscrire</button>
			</div>
		</div>
	</div>
</div>
  <script src="./assets/js/connexion.js"></script>
</body>
</html>