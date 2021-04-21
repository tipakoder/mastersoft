<div class="popup-wrapper" id="popup-product">
    <div class="block">
        <div class="closeit" onclick="hidePopup()"><i class="fas fa-times"></i></div>

        <div class="list">
            <div class="item">
                <div class="image" style="background-image: url('/view/res/img/1с_p1.jpg');"></div>
                <h2 class="text">1C:Бухгалтерия</h2>
            </div>

            <div class="item form">
                <h3 class="title">Заявка на консультацию</h3>
                <input type="text" placeholder="Имя" id="answer_name">
                <input type="tel" placeholder="Телефон" id="answer_tel">
                <textarea placeholder="Что-то ещё?" id="answer_text" rows="5"></textarea>
                <button onclick="answer_send()" class="btn">Отправить заявку</button>
            </div>
        </div>
    </div>
</div>

<section id="product">
    <div class="container">
        <div class="section-path"><a href="/">Главная</a> / <a href="/products/">Продукция</a> / <a href="/products/<?=$PRODUCT['code_name']?>/" class="selection"><?=$PRODUCT['display_name']?></a></div>
        <div class="section-title"><?=$PRODUCT['display_name']?></div>

        <div class="block">
            <div class="text"><?=$PRODUCT['text']?></div>
        </div>

        <?php if($SERVICES != null): ?>
        <div class="block">
            <h3 class="title">Наши услуги</h3>
            <div class="content row">
                <?php foreach($SERVICES as $service): ?>
                    <div class="item">
                        <div class="image"><img id="<?=$service['id']?>_product_image" src="<?=$service['image']?>" alt=""></div>
                        <div class="content">
                            <h2><?=$service['name']?></h2>
                        </div>
                        <button class="btn" onclick="showPopup('<?=$service['id']?>')">Получить консультацию</button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<script src="/view/res/js/product.js"></script>