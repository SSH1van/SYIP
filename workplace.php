<?php
$url = substr($_SERVER['REQUEST_URI'], -10);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/workplace/workplace.css">
    <link rel="stylesheet" href="style/style_fonts.css">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/site.webmanifest">
    <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title>Работа</title>
</head>

<body>
    <!-- Bubbles -->
    <div class="bubbles">
        <img src="img/background/bubbles.svg" class="bubbles_svg" alt="">
    </div>

    <!-- Work -->
    <div class="work">
        <div class="container">
            <div class="work-inner">
                <?php require_once __DIR__ . '/src/workplace/get.php'; ?>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
</body>

</html>