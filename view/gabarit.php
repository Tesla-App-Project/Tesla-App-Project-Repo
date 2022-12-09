<!doctype html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>My sweet MVC</title>
</head>
<body>
<?php View::montrer('standard/entete'); ?>
<?php echo $A_view['body'] ?>
<?php View::montrer('standard/pied'); ?>
</body>
</html>