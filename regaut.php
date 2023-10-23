<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style_fonts.css">
    <link rel="stylesheet" href="style/regaut/styleRA.css">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/site.webmanifest">
    <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <meta mame="description" content="Интеллектуальная собственность">
    <meta mame="keywords" content="Интеллектуальная собственность">
    <meta name="googlebot" content="notranslate">

    <title>SYIP</title>
</head>

<body>
    <!-- SVG -->

    <!-- Bubbles -->
    <div class="bubbles reverce">
        <img src="img/background/bubbles.svg" class="bubbles_svg" alt="">
    </div>

    
   


    <div class="container">
        <div class="box"></div>
        <div class="container-forms">
            <div class="container-info">
                <div class="info-item">
                    <div class="table">
                        <div class="table-cell">
                            <p>Уже есть аккаунт?</p>
                            <div class="btn another">Войти</div>
                        </div>
                    </div>
                </div>
                <div class="info-item">
                    <div class="table">
                        <div class="table-cell">
                            <p>Нет аккаунта?</p>
                            <div class="btn another">Создать</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-form">
                <div class="form-item log-in">
                    <div class="table">
                        <div class="table-cell">
                            <a href="index.php" class="ssg_a"><svg viewBox="0 0 200 200">
                                    <path d="M100,15a85,85,0,1,0,85,85A84.93,84.93,0,0,0,100,15Zm0,150a65,65,0,1,1,65-65A64.87,64.87,0,0,1,100,165ZM116.5,57.5a9.67,9.67,0,0,0-14,0L74,86a19.92,19.92,0,0,0,0,28.5L102.5,143a9.9,9.9,0,0,0,14-14l-28-29L117,71.5C120.5,68,120.5,61.5,116.5,57.5Z" />
                                </svg>
                            </a>
                            <div class="table-cell-inner">
                                <?php
                                    if ($_SESSION['message']) {
                                        echo '<p class="error_message"> ' . $_SESSION['message'] . ' </p>';
                                    }
                                    unset($_SESSION['message']);
                                ?>
                                <form action="vendor/login.php" method="post">
                                    <input placeholder="Логин" name="login" type="text" />
                                    <input placeholder="Пароль" name="pass" type="password" />
                                    <button type="submit" class="btn in">Войти</button>
                                </form>

                                

                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-item sign-up">
                    <div class="table">
                        <div class="table-cell">
                            <a href="index.php"><svg viewBox="0 0 200 200">
                                    <path d="M100,15a85,85,0,1,0,85,85A84.93,84.93,0,0,0,100,15Zm0,150a65,65,0,1,1,65-65A64.87,64.87,0,0,1,100,165ZM116.5,57.5a9.67,9.67,0,0,0-14,0L74,86a19.92,19.92,0,0,0,0,28.5L102.5,143a9.9,9.9,0,0,0,14-14l-28-29L117,71.5C120.5,68,120.5,61.5,116.5,57.5Z" />
                                </svg>
                            </a>
                            <form action="vendor/singup.php" method="post">
                                <input placeholder="Email" name="email" type="email" />
                                <input placeholder="Имя" name="sname" type="text" />
                                <input placeholder="Логин" name="login" type="text" />
                                <input placeholder="Пароль" name="pass" type="password" />
                                <button class="btn in">Создать</и>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <?php
        $_SESSION['message'] = ""
    ?>

   

    <script src="js/jquery.min.js"></script>
    <script src="js/regaut/app.js"></script>
</body>

</html>