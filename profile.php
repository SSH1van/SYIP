<?php
session_start();

if (!$_SESSION['user']) {
    header('Location: regaut.php');
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/styleProfile.css">
    <link rel="stylesheet" href="style/style_fonts.css">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/site.webmanifest">
    <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title>SYIP</title>
</head>

<body>
    <!-- Bubbles -->
    <div class="bubbles reverce">
        <img src="img/background/bubbles.svg" class="bubbles_svg" alt="">
    </div>

    <h1><?= $_SESSION['user']['name']?></h1>
    <a href="vendor/logout.php" class="logout">Выход</a>

    <script src="js/jquery.min.js"></script>


</body>

</html>