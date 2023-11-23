<?php
require_once __DIR__ . '/src/helpers.php';
checkGuest();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/app.css">
    <link rel="stylesheet" href="style/fonts.css">
    <link rel="stylesheet" href="style/regaut/style.css">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/site.webmanifest">
    <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title>Авторизация и регистрация</title>
</head>

<body>
    <!-- Bubbles -->
    <div class="bubbles reverce">
        <img src="img/background/bubbles.svg" class="bubbles_svg" alt="">
    </div>

    <!-- Signup and login -->
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
                            <a href="index.php" class="ssg_a">
                                <svg viewBox="0 0 200 200">
                                    <path d="M100,15a85,85,0,1,0,85,85A84.93,84.93,0,0,0,100,15Zm0,150a65,65,0,1,1,65-65A64.87,64.87,0,0,1,100,165ZM116.5,57.5a9.67,9.67,0,0,0-14,0L74,86a19.92,19.92,0,0,0,0,28.5L102.5,143a9.9,9.9,0,0,0,14-14l-28-29L117,71.5C120.5,68,120.5,61.5,116.5,57.5Z" />
                                </svg>
                            </a>
                            <div class="table-cell-inner">
                                <?php if (hasMessage('error')) : ?>
                                    <div class="notice error"><?php echo getMessage('error') ?></div>
                                <?php endif; ?>
                                <form action="src/vendor/login.php" method="post">
                                    <label for="email">
                                        <input placeholder="Email" name="email" type="email" value="<?php echo old('lemail') ?>" <?php echo validationErrorAttr('lemail'); ?> />
                                        <?php if (hasValidationError('lemail')) : ?>
                                            <small><?php echo validationErrorMessage('lemail'); ?></small>
                                        <?php endif; ?>
                                    </label>
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
                            <div class="table-cell-inner">
                                <?php if (hasValidationError('accept')) : ?>
                                    <small class="accept"><?php echo validationErrorMessage('accept'); ?></small>
                                <?php endif; ?>

                                <form action="src/vendor/signup.php" method="post" enctype="multipart/form-data">
                                    <label for="email">
                                        <input placeholder="Email" name="email" type="email" value="<?php echo old('email') ?>" <?php echo validationErrorAttr('email'); ?> />
                                        <?php if (hasValidationError('email')) : ?>
                                            <small><?php echo validationErrorMessage('email'); ?></small>
                                        <?php endif; ?>
                                    </label>
                                    <label for="pass">
                                        <input placeholder="Пароль" name="pass" type="password" value="<?php echo old('pass') ?>" <?php echo validationErrorAttr('pass'); ?> />
                                        <?php if (hasValidationError('pass')) : ?>
                                            <small><?php echo validationErrorMessage('pass'); ?></small>
                                        <?php endif; ?>
                                    </label>
                                    <label for="name">
                                        <input placeholder="ФИО" name="name" type="text" value="<?php echo old('name') ?>" <?php echo validationErrorAttr('name'); ?> />
                                        <?php if (hasValidationError('name')) : ?>
                                            <small><?php echo validationErrorMessage('name'); ?></small>
                                        <?php endif; ?>
                                    </label>
                                    <button type="submit" class="btn in sign">Создать</и>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $_SESSION['messageSignup'] = "";
    $_SESSION['messageLogin'] = "";
    ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/regaut/regaut.js"></script>
</body>

</html>