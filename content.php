<?php
require_once __DIR__ . '/src/session.php';
$_SESSION['num'] = 1;
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/app.css">
    <link rel="stylesheet" href="style/content/style.css">
    <link rel="stylesheet" href="style/fonts.css">

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



    <!-- Content -->
    <div class="title">Все работы
        <a href="javascript:history.back()" calss="arrow-back">
            <svg viewBox="0 0 200 200">
                <path d="M100,15a85,85,0,1,0,85,85A84.93,84.93,0,0,0,100,15Zm0,150a65,65,0,1,1,65-65A64.87,64.87,0,0,1,100,165ZM116.5,57.5a9.67,9.67,0,0,0-14,0L74,86a19.92,19.92,0,0,0,0,28.5L102.5,143a9.9,9.9,0,0,0,14-14l-28-29L117,71.5C120.5,68,120.5,61.5,116.5,57.5Z" />
            </svg>
        </a>
    </div>
    <div class="content">
        <?php require_once __DIR__ . '/src/content.php'; ?>
        <div id="showmore-triger" data-page="1" data-max="<?php echo $amt; ?>"></div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/content/content.js"></script>
</body>

</html>