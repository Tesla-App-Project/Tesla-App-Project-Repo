<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../assets/css/Boostrap/bootstrap.css">
    <link rel="stylesheet" href="../../assets/css/Boostrap/bootstrap.min.css">
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
