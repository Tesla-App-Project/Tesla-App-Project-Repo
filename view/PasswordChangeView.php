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
                <!-- Forgot Password Form -->
                <div class="forgot form-peice">
                    <form class="forgot-form" action="/user/forgotPassword/" method="post">
                        <div class="form-group">
                            <label for="forgotemail">Email</label>
                            <input type="email" name="user_mail" id="forgotemail" required>
                        </div>

                        <div class="CTA">
                            <input type="submit" value="Envoyer">
                        </div>
                    </form>
                </div><!-- End Forgot Password Form -->

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
