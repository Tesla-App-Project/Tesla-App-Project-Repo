<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="./assets/css/style.scss" rel="stylesheet">
    <script src="./assets/js/script.js"></script>
    <title>Accueil</title>
</head>
<body>
<?php View::show('standard/header'); ?>
<?php echo $A_View['body'] ?>
<?php View::show('standard/footer'); ?>
</body>
</html>