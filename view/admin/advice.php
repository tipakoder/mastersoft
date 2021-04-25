<?php if($ADVICES != null): ?>
    <section id="advice">
        <div class="container">
            <h3 class="section-title">Заявки на консультацию</h3>
            <div class="content">
                <div class="row-call">
                    <h3 class="service"><b>Продукт -> Сервис</b></h3>
                    <h3 class="name">Имя клиента</h3>
                    <h3 class="tel">Номер телефона</h3>
                    <h3 class="text">Дополнительный комментарий</h3>
                    <p></p>
                </div>
                <?php foreach($ADVICES as $advice): ?>
                    <div class="row-call">
                        <p class="service"><?=$advice['product']?> -> <?=$advice['service']?></p>
                        <p class="name"><?=$advice['name']?></p>
                        <p class="tel"><?=$advice['tel']?></p>
                        <p class="text"><?=$advice['text']?></p>
                        <button class="btn" onclick="adviceProcess(<?=$advice['id']?>);">Готово</button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php else: ?>
    <section id="advice" class="background plug">
        <h3 class="text">Заявки на консультацию отсутствуют</h3>
    </section>
<? endif; ?>

<script src="/view/res/js/advice_admin.js"></script>