<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/Boostrap/bootstrap.css">
    <link rel="stylesheet" href="assets/css/Boostrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/test.css">
    <meta name="viewport" content="width=device-width, target-densitydpi=dpi, initial-scale=1" />
    <script src="https://kit.fontawesome.com/b368ec75de.js" crossorigin="anonymous"></script>
    <title> Connexion </title>
    <script>
        if("serviceWorker" in navigator) {
            navigator.serviceWorker.register("service-worker.js")
                .then(registration => {
                    console.log("Service Worker Registered");
                })
                .catch(err => {
                    console.log("Service Worker Failed to Register", err);
                })
        }
    </script>
</head>
<body>

<?php
if(isset($_GET['error'])){
    if($_GET['error'] === "badlogin"){
        echo "<div class='alert alert-danger' role='alert'>
                    Identifiant ou mot de passe incorrect
                  </div>";
    }
}
?>
<div class="container">
    <section id="formHolder">

        <div class="row">

            <!-- Brand Box -->
            <div class="col-sm-6 brand">
                <a href="#" class="logo">22 - 23 <span>.</span></a>

                <div class="heading">
                    <h2>Tesla</h2>
                    <p>Connecter votre voiture</p>
                </div>

                <div class="success-msg">
                    <p>Great! You are one of our members now</p>
                    <a href="#" class="profile">Your Profile</a>
                </div>
            </div>


            <!-- Form Box -->
            <div class="col-sm-6 form">

                <!-- Login Form -->
                <div class="login form-peice switched">
                    <form class="login-form" action="/user/loginUser/" method="post">
                        <div class="form-group">
                            <label for="loginemail">Email</label>
                            <input type="email" name="user_mail" id="loginemail" required>
                        </div>

                        <div class="form-group">
                            <label for="loginPassword">Mot de passe</label>
                            <input type="password" name="user_password" id="loginPassword" required>
                        </div>

                        <div class="CTA">
                            <button class="btn rounded-3 btn-sm" style="color: white; background-color: #f95959;"  type="submit">Se connecter</button>
                            <a href="/PasswordChangeView.php" class="switchmod">Mot de passe oublié ?</a>
                            <a href="#" class="switch">Vous n'avez pas de compte ?</a>
                        </div>
                    </form>
                </div><!-- End Login Form -->


                <!-- Signup Form -->
                <div class="signup form-peice">
                    <form class="signup-form" action="/user/newUser/" method="post">

                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" name="user_first_name" id="name" class="name">
                            <span class="error"></span>
                        </div>

                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" name="user_last_name" id="prenom" class="prenom">
                            <span class="error"></span>
                        </div>

                        <div class="form-group">
                            <label for="identifiant">Identifiant</label>
                            <input type="text" name="user_username" id="identifiant" class="identifiant">
                            <span class="error"></span>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="user_mail" id="email" class="email">
                            <span class="error"></span>
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="user_password" id="password" class="pass">
                            <span class="error"></span>
                        </div>

                        <div class="CTA">
                            <button class="btn rounded-3 btn-sm" style="color: white; background-color: #f95959;" type="submit">S'inscrire</button>
                            <a href="#" class="switch">Déjà un compte ?</a>
                        </div>
                    </form>
                </div><!-- End Signup Form -->
            </div>
        </div>

    </section>


    <footer>
        <p>
            Créer par: <a href="https://github.com/Tesla-App-Project/Tesla-App-Project-Repo" target="_blank">Tesla App <i class="fa fa-github" aria-hidden="true"></i></a>
        </p>
    </footer>

</div>

<script src="assets/js/Boostrap/bootstrap.js"></script>
<script src="assets/js/Boostrap/bootstrap.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.js"></script>
<script src="assets/js/test.js"></script>

</body>
</html>
