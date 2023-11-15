<?php
require_once __DIR__ . '/src/helpers.php';
checkAuth();

$user = currentUser();
$_SESSION['num'] = 1;
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
    <div class="block"></div>

    <!-- SVG -->
    <svg style="display: none">
        <symbol id="exit" fill="none" viewBox="0 0 24 24">
            <g>
                <path d="M15 4.00098H5V18.001C5 19.1055 5.89543 20.001 7 20.001H15" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M16 15.001L19 12.001M19 12.001L16 9.00098M19 12.001H9" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
            </g>
        </symbol>
        <symbol id="home">
            <g viewBox="0 0 24 24">
                <path preserveAspectRatio="xMidYMin" d="M31.772 16.043l-15.012-15.724c-0.189-0.197-0.449-0.307-0.721-0.307s-0.533 0.111-0.722 0.307l-15.089 15.724c-0.383 0.398-0.369 1.031 0.029 1.414 0.399 0.382 1.031 0.371 1.414-0.029l1.344-1.401v14.963c0 0.552 0.448 1 1 1h6.986c0.551 0 0.998-0.445 1-0.997l0.031-9.989h7.969v9.986c0 0.552 0.448 1 1 1h6.983c0.552 0 1-0.448 1-1v-14.968l1.343 1.407c0.197 0.204 0.459 0.308 0.722 0.308 0.249 0 0.499-0.092 0.692-0.279 0.398-0.382 0.411-1.015 0.029-1.413zM26.985 14.213v15.776h-4.983v-9.986c0-0.552-0.448-1-1-1h-9.965c-0.551 0-0.998 0.445-1 0.997l-0.031 9.989h-4.989v-15.777c0-0.082-0.013-0.162-0.032-0.239l11.055-11.52 10.982 11.507c-0.021 0.081-0.036 0.165-0.036 0.252z"></path>
            </g>
        </symbol>
        <symbol id="note">
            <g viewBox="0 0 24 24">
                <path d="M24.98 30.009h-23v-25h14.050l2.022-1.948-0.052-0.052h-16.020c-1.105 0-2 0.896-2 2v25c0 1.105 0.895 2 2 2h23c1.105 0 2-0.895 2-2v-14.646l-2 1.909v12.736zM30.445 1.295c-0.902-0.865-1.898-1.304-2.961-1.304-1.663 0-2.876 1.074-3.206 1.403-0.468 0.462-13.724 13.699-13.724 13.699-0.104 0.106-0.18 0.235-0.219 0.38-0.359 1.326-2.159 7.218-2.176 7.277-0.093 0.302-0.010 0.631 0.213 0.851 0.159 0.16 0.373 0.245 0.591 0.245 0.086 0 0.172-0.012 0.257-0.039 0.061-0.020 6.141-1.986 7.141-2.285 0.132-0.039 0.252-0.11 0.351-0.207 0.631-0.623 12.816-12.618 13.802-13.637 1.020-1.052 1.526-2.146 1.507-3.253-0.019-1.094-0.55-2.147-1.575-3.129zM29.076 6.285c-0.556 0.574-4.914 4.88-12.952 12.798l-0.615 0.607c-0.921 0.285-3.128 0.994-4.796 1.532 0.537-1.773 1.181-3.916 1.469-4.929 1.717-1.715 13.075-13.055 13.506-13.48 0.084-0.084 0.851-0.821 1.795-0.821 0.536 0 1.053 0.244 1.577 0.748 0.627 0.602 0.95 1.179 0.959 1.72 0.010 0.556-0.308 1.171-0.943 1.827z"></path>
            </g>
        </symbol>
    </svg>

    <!-- Bubbles -->
    <div class="bubbles reverce">
        <img src="img/background/bubbles.svg" class="bubbles_svg" alt="">
    </div>

    <!-- Menu -->
    <div class="menu">
        <div class="btn-inner">
            <div class="btn burger">
                <div class="icon"></div>
            </div>
            <div class="btn back">
                <div class="icon"></div>
            </div>
        </div>

        <div class="menu-inner">
            <div class="menu-navs">
                <div class="menu-inner-nav">
                    <div class="menu-nav common" id="nav-main">
                        <svg class="menu-icon move">
                            <use xlink:href="#home"></use>
                        </svg>
                        <span>Главная</span>
                        <svg class="menu-icon move small">
                            <use xlink:href="#home"></use>
                        </svg>
                    </div>
                    <div class="menu-nav common" id="nav-projects">
                        <svg class="menu-icon move">
                            <use xlink:href="#note"></use>
                        </svg>
                        <span>Мои работы</span>
                        <svg class="menu-icon move small">
                            <use xlink:href="#note"></use>
                        </svg>
                    </div>
                </div>
                <form action="src/vendor/logout.php" method="post" class="user">
                    <button role="button">
                        <svg class="menu-icon">
                            <use xlink:href="#exit"></use>
                        </svg>
                        <span><?php echo $user['email'] ?></span>
                        <svg class="menu-icon small">
                            <use xlink:href="#exit"></use>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>


    <!-- Add Content -->
    <div class="all-content">
        <div class="all-contetn-inner">

            <div class="shell main" id="main">
                <div class="elemrnt-main">
                    Добро пожаловать,
                    <div class="main-user"><?php echo $user['name'] ?></div>
                </div>
            </div>

            <div class="shell projects open" id="projects">
                <div class="elemrnt-projects open">
                    <div class="projects-title">Мои работы</div>
                    <form class="projects-adding" enctype="multipart/form-data" action="src/add/add.php" method="post">
                        <div class="projects-file">
                            <label class="filelabel">
                                <i class="fa fa-paperclip">
                                </i>
                                <span class="filelabel-title">
                                    doc/pdf
                                </span>
                                <input class="FileUpload1" id="FileInput" name="file" type="file" />
                            </label>
                            <?php if (hasValidationError('file')) : ?>
                                <small><?php echo validationErrorMessage('file'); ?></small>
                            <?php endif; ?>
                        </div>

                        <div class="adding-right">
                            <input name="name" type="text" class="projects-input name" placeholder="Название" value="<?php echo old('name') ?>" <?php echo validationErrorAttr('name'); ?>>
                            <?php if (hasValidationError('name')) : ?>
                                <small><?php echo validationErrorMessage('name'); ?></small>
                            <?php endif; ?>

                            <input name="city" type="text" class="projects-input city" placeholder="Город" value="<?php echo old('city') ?>" <?php echo validationErrorAttr('city'); ?>>
                            <?php if (hasValidationError('city')) : ?>
                                <small><?php echo validationErrorMessage('city'); ?></small>
                            <?php endif; ?>

                            <button class="projects-btn" type="submit">Добавить</button>
                        </div>
                    </form>
                </div>

                <!-- Сontent -->
                <div class="contetn">
                    <?php require_once __DIR__ . '/src/add/ajax.php'; ?>
                    <div id="showmore-triger" data-page="1" data-max="<?php echo $amt; ?>">
                        <img src="" alt="">
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/profile/ajax.js"></script>
    <script src="js/profile/profile.js"></script>


</body>

</html>