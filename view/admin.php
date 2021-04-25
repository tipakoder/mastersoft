<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$SYS_TITLE?></title>
    <link rel="stylesheet" href="/view/res/css/animation.css">
    <link rel="stylesheet" href="/view/res/css/main.css">
    <link rel="stylesheet" href="/view/res/css/admin.css">
    <script src="/view/res/js/jquery-3.3.1.min.js"></script>
</head>
<body>

    <header id="header-wrapper">
        <div class="main">
            <div class="container">
                <div class="logotype">
                    <div class="symbol"><a href="/admin/">МастерSOFT</a></div>
                    <p class="text">Панель администратора<br><b>Вы авторизованы как <?=$SYS_CURRENTUSER['login']?></b></p>
                </div>

                <nav class="navigation">
                    <ul>
                        <li>
                            <a href="/admin/products/">Продукты</a>
                            <div class="sub-menu">
                                <ul>
                                    <?php foreach($PRODUCTS as $product): ?>
                                    <li><a href="/admin/products/<?=$product['code_name']?>/"><?=$product['display_name']?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </li>
                        <li><a href="/admin/calls/">Звонки</a></li>
                        <li><a href="/admin/advice/">Консультация</a></li>
                        <li><a href="/admin/reviews/">Отзывы</a></li>
                        <li><a href="/admin/news/">Новости</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main id="main-wrapper">

        <?php require_once "view/{$SYS_PAGE}.php"; ?>

    <script src="https://kit.fontawesome.com/79f16d32fa.js" crossorigin="anonymous"></script>
    <script src="/view/res/js/jquery.touchSlider.js"></script>
    <script src="/view/res/js/main.js"></script>
</body>
</html>