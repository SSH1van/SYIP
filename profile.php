<?php
require_once __DIR__ . '/src/helpers.php';
checkAuth();

$user = currentUser();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/profile/styleProfile.css">
    <link rel="stylesheet" href="style/style_fonts.css">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/site.webmanifest">
    <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title>Личный кабинет</title>
</head>

<body>
    <!-- Bubbles -->
    <div class="bubbles reverce">
        <img src="img/background/bubbles.svg" class="bubbles_svg" alt="">
    </div>

    <div class="menu">
        <div class="btn-burger">
            <div class="icon"></div>
        </div>
        <div class="menu-inner ">
            <div class="user"><?php echo $user['email'] ?></div>
            <div class="menu-navs">
                <div class="menu-nav">Главная</div>
                <div class="menu-nav">Мои работы</div>
                <div class="menu-nav"></div>
            </div>
        </div>
    </div>



    <!-- <h1><?php echo $user['name'] ?></h1>
    <form action="src/vendor/logout.php" method="post" class="logout">
        <button role="button">Выйти из аккаунта</button>
    </form>-->

    <script src="js/jquery.min.js"></script>
    <script src="js/profile/profile.js"></script>

</body>

</html>