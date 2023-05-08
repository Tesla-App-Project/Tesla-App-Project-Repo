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
<div class="d-flex vh-100 justify-content-center align-items-center">
    <div class="p-2 flex-grow">
        <div class="smallContainer border shadow rounded">
            <div class="row g-0">
                <div class="col-sm-6 col-xs-12 d-none d-sm-block position-relative" id='leftCol'>
                    <img src="/assets/images/tesla.jpg" height="100%"/>
                    <div id="pt-5 text-end w-100" class="position-absolute end-0 top-0">
                        <a href="#" id="connexion-btn" class="customBtn activeBtn">Connexion</a><br />
                        <a href="#" id="inscription-btn" class="customBtn">Inscription</a>
                    </div>

                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="d-flex flex-column" style="height: auto">

                        <div class="text-center d-sm-none d-xs-block">
                            <div class="switch-button">
                                <input class="switch-button-checkbox" type="checkbox">
                                <label class="switch-button-label" for=""><span class="switch-button-label-span">Connexion</span></label>
                            </div>
                        </div>

                        <div class="my-auto p-5" id="connexion">
                            <div class="text-center">
                                <div>
                                    <img src="/assets/images/logo_tesla.png" height="66" />
                                </div>
                                <h2 class="h3 pb-3">Connexion</h2>
                            </div>
                            <form method="post" action="/user/loginUser/">
                                <div class="position-relative my-3 inputGroup text-center">
                                    <span class="position-absolute"><i class="far fa-user"></i></span>
                                    <input type="email" class="border-0 border-bottom w-100" placeholder="Email" name="user_mail"/>
                                </div>
                                <div class="position-relative my-3 inputGroup text-center">
                                    <span class="position-absolute"><i class="far fa-eye-slash"></i></span>
                                    <input type="password" class="border-0 border-bottom w-100" placeholder="Mot de passe" name="user_password"/>
                                </div>
                                <div class="d-flex align-items-center justify-content-between pt-2">
                                    <a class="linkFlare" href="#"><small>Mot de passe oublié ?</small></a>
                                    <button class="btn btn-accent px-4 rounded-pill" type="submit">Se connecter</button>
                                </div>
                            </form>
                        </div>

                        <div class="my-auto p-5" id="inscription">
                            <div class="text-center">
                                <div>
                                    <img src="/assets/images/logo_tesla.png" height="66" />
                                </div>
                                <h2 class="h3 pb-3">Inscription</h2>
                                <form method="post" action="/user/newUser/">

                                    <div class="position-relative my-3 inputGroup text-center">
                                        <span class="position-absolute"><i class="far fa-user"></i></span>
                                        <input type="text" class="border-0 border-bottom w-100" placeholder="Nom" />
                                    </div>

                                    <div class="position-relative my-3 inputGroup text-center">
                                        <span class="position-absolute"><i class="far fa-user"></i></span>
                                        <input type="text" class="border-0 border-bottom w-100" placeholder="Prénom" />
                                    </div>

                                    <div class="position-relative my-3 inputGroup text-center">
                                        <span class="position-absolute"><i class="far fa-user"></i></span>
                                        <input type="text" class="border-0 border-bottom w-100" placeholder="Identifiant" />
                                    </div>

                                    <div class="position-relative my-3 inputGroup text-center">
                                        <span class="position-absolute"><i class="far fa-user"></i></span>
                                        <input type="email" class="border-0 border-bottom w-100" placeholder="Email" />
                                    </div>

                                    <div class="position-relative my-3 inputGroup text-center">
                                        <span class="position-absolute"><i class="far fa-eye-slash"></i></span>
                                        <input type="password" class="border-0 border-bottom w-100" placeholder="Mot de passe" />
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between pt-2">
                                        <button class="btn btn-accent px-4 rounded-pill">S'inscrire</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/Boostrap/bootstrap.js"></script>
<script src="assets/js/Boostrap/bootstrap.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.js"></script>
<script src="assets/js/test.js"></script>

</body>
</html>
