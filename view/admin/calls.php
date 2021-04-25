<?php if($CALLS != null): ?>
    <section id="calls">
        <div class="container">
            <h3 class="section-title">Заявки на звонки</h3>
            <div class="content">
                <div class="row-call">
                    <h3 class="name">Имя клиента</h3>
                    <h3 class="tel">Номер телефона</h3>
                    <h3 class="text">Дополнительный комментарий</h3>
                    <p></p>
                </div>
                <?php foreach($CALLS as $call): ?>
                    <div class="row-call">
                        <p class="name"><?=$call['name']?></p>
                        <p class="tel"><?=$call['tel']?></p>
                        <p class="text"><?=$call['text']?></p>
                        <button class="btn" onclick="callProcess(<?=$call['id']?>)">Готово</button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php else: ?>
    <section id="calls" class="background plug">
        <h3 class="text">Заявки на звонки отсутствуют</h3>
    </section>
<? endif; ?>

<script src="/view/res/js/calls_admin.js"></script>