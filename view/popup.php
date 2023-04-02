<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--=============== CSS ===============-->
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">-->
    <link rel="stylesheet" href="./assets/css/popup.css">

    <title>Token</title>
</head>
<body>
<section class="modal container">
<!--    <button class="modal__button" id="open-modal">-->
<!--        Open Modal-->
<!--    </button>-->

    <div class="modal__container show-modal" id="modal-container">
        <div class="modal__content">
<!--            <div class="modal__close close-modal" title="Close">-->
<!--                <i class='bx bx-x'></i>-->
<!--            </div>-->

<!--            <img src="assets/img/star-trophy.png" alt="" class="modal__img">-->

            <h1 class="modal__title">Vous y êtes presque !</h1>
            <h4 class="modal__description">Il ne vous reste qu'une étape avant de pouvoir contrôler votre véhicule.</h4>
            <p class="modal__description">Vous devez ajouter un token à votre compte. Cliquez sur <strong>"Créer mon token"</strong> pour générer votre token puis insérez le dans le champ ci-dessous :</p>

            <input type="text" name="token" id="token" placeholder="Votre token" class="modal__input" style="width: 100%;
    height: 5vh;
    border-radius: 10px;
    margin-bottom: 3vh;
    font-family: cursive;
    padding-left: 10px;
    overflow: auto;" required>

            <section style="display: flex; gap: 20px" id="section-flex">
                <button class="modal__button" id="validate_token">
                    Valider
                </button>

                <a href="https://tesla-info.com/tesla-token.php" target="_blank" style="text-decoration: none" class="modal__button modal__button-width">
                    Créer mon token
                </a>
            </section>


        </div>
    </div>
</section>

<!--=============== MAIN JS ===============-->
<script src="./assets/js/popup.js"></script>
</body>
</html>

<?php