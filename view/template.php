<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$SYS_TITLE?></title>
    <link rel="stylesheet" href="/view/res/css/animation.css">
    <link rel="stylesheet" href="/view/res/css/main.css">
    <link rel="stylesheet" href="/view/res/css/template.css">
</head>
<body>
    <div class="popup-wrapper" id="popup-phone">
        <div  class="block">
            <div class="closeit" onclick="hidePopupPhone()"><i class="fas fa-times"></i></div>

            <div class="list">
                <h3 class="title">Заявка на звонок</h3>
                <input type="text" placeholder="Имя" id="phone_name">
                <input type="tel" placeholder="Телефон" id="phone_tel">
                <textarea placeholder="Что-то ещё?" id="phone_text" rows="5"></textarea>
                <button onclick="phone_send()" class="btn">Отправить заявку</button>
            </div>
        </div>
    </div>

    <header id="header-wrapper">
        <div class="info">
            <div class="container">
                <div class="item">
                    <p><i class="fas fa-envelope"></i> Email: <a href="mailto:contact@mastersoft.w">contact@mastersoft.w</a></p>
                </div>
    
                <div class="item phones">
                    <p><i class="fas fa-phone-alt"></i> <a href="tel:+73532440550">(3532) 440-550</a></p>
                    <p><i class="fas fa-phone-alt"></i> <a href="tel:88007755848">8 (800) 77-55-848</a></p>
                </div>
    
                <div class="item">
                    <div class="search-bar">
                        <input type="text" placeholder="Поиск в Яндекс">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="main">
            <div class="container">
                <div class="logotype">
                    <div class="symbol"><a href="/">МастерSOFT</a></div>
                    <p class="text">Надёжное ПО<br>для всей России</p>
                </div>

                <nav class="navigation">
                    <ul>
                        <li>
                            <a href="/products/">Продукты</a>
                            <div class="sub-menu">
                                <ul>
                                    <?php foreach($PRODUCTS as $product): ?>
                                    <li><a href="/products/<?=$product['code_name']?>/"><?=$product['display_name']?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="/company/">О компании</a>
                            <div class="sub-menu">
                                <ul>
                                    <li><a href="/company/contacts/">Контакты</a></li>
                                    <li><a href="/company/reviews/">Отзывы</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="/news/">Новости</a></li>
                    </ul>
                </nav>

                <button class="btn" onclick="showPopupPhone()">Заказать звонок</button>
            </div>
        </div>
    </header>

    <main id="main-wrapper">

        <?php require_once "view/{$SYS_PAGE}.php"; ?>
        
        <?php if($SYS_OFF_CONTENT !== true): ?>
        <section id="advantages" class="background">
            <div class="container">
                <div class="section-title">Наши приемущества</div>
                <div class="content">
                    <div class="item">
                        <i class="fas fa-user-tie icon"></i>
                        <p class="title">Ответственность</p>
                    </div>

                    <div class="item">
                        <i class="fas fa-satellite-dish"></i>
                        <p class="title">Быстрая поддержка</p>
                    </div>

                    <div class="item">
                        <i class="far fa-clock"></i>
                        <p class="title">Короткие сроки</p>
                    </div>

                    <div class="item">
                        <i class="fas fa-book-dead"></i>
                        <p class="title">Богатый опыт</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="reviews">
            <div class="container">
                <div class="section-title">Отзывы о компании</div>
                <div class="content slider">
                    <ul>
                        <li>
                            <div class="icon">
                                <img src="/view/res/img/nikobank.png" alt="">
                            </div>
                            <div class="content">
                                <span class="title">Сивелькина С.В.</span>
                                <span class="date">20 марта 2017</span>
                            </div>
                            <p class="description">ПАО "НИКО-БАНК" выражает свою благодарность за оперативную и грамотную работу.<br>  В условиях постоянно меняющегося законодательства Банк заинтересован иметь полную и актуальную номативную базу. Это обеспечивается использованием Банком справочно-нормативной системы "Гарант". <br>  <br>Безусловным плюсом в работе компании "МастерСофт" является быстрое реагирование сотрудников при предоставлении документов по запросу Банка, принятых до обновления справочно-правовой системы.<br></p>
                        </li>

                        <li>
                            <div class="icon">
                                <img src="/view/res/img/atam.png" alt="">
                            </div>
                            <div class="content">
                                <span class="title">Кетерер Т.М.</span>
                                <span class="date">19 февраля 2018</span>
                            </div>
                            <p class="description">Главный бухгалтер муниципального бюджетного учреждения дополнительного образования "Дворец творчества детей и молодёжи" Кетерер Татьяна Михайловна выражает благодарность специалистам МастерСофт: <br>"Я хотела бы объявить благодарность вашим сотрудникам. Работает с нами по программе "1С: Бухгалтерия бюджетного учреждения 8" непосредственно Шевлягина Юлия.<br> <br>Так же огромная благодарность за отзывчивость, терпение и квалифицированную, своевременную помощь Набокиной Олесе и Ерёменко Татьяне (они нас сопровождают по программе "Зарплата и Кадры").<br> <br>Им очень с нами тяжело, но они терпеливо продолжают сотрудничать. С вами очень надёжно. Конечно же наши ошибки есть и без вас мы бы вообще о них не знали и в суде, наверное, судились бы. А сейчас мы решаем вопросы..."</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        
        <?php if($HOT_NEWS != null): ?>
        <section id="news" class="background">
            <div class="container">
                <div class="section-title">Новости</div>
                <div class="content">
                    <?php foreach($HOT_NEWS as $news): ?>
                    <a class="item" href="/news/<?=$news['id']?>/">
                        <div class="image" style="background-image: url('<?=$news['image']?>');">
                            <div class="overlay"><?=$news['date']?></div>
                        </div>
                        <div class="title"><?=$news['title']?></div>
                    </a>
                    <?php endforeach;?>
                </div>
            </div>
        </section>
        <?php endif;
        endif; ?>
    </main>

    <footer id="footer-wrapper">
        <div class="container">
            <b>МастерSOFT</b> © 2021 г.
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/79f16d32fa.js" crossorigin="anonymous"></script>
    <script src="/view/res/js/jquery-3.3.1.min.js"></script>
    <script src="/view/res/js/jquery.touchSlider.js"></script>
    <script src="/view/res/js/main.js"></script>
</body>
</html>