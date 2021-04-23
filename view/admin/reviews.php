<?php if($REVIEWS != null){ ?>
    <section id="reviews">
        <div class="container">
            <h2 class="section-title">Отзывы</h2>
            <div class="content">
                <?php foreach($REVIEWS as $review): ?>
                    <div class="item" id="<?=$review['id']?>_review">
                        <h4 class="fullname"><?=$review['name']?> <span class="date"><?=$review['date']?></span></h4>
                        <textarea id="<?=$review['id']?>_review_text" cols="30" rows="10" class="text"><?=$review['text']?></textarea>
                        <div class="actions">
                            <button onclick="process_review(0, <?=$review['id']?>)" class="btn">Опубликовать</button>
                            <button onclick="process_review(1, <?=$review['id']?>)" class="btn">Удалить</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php }else{ ?>
    <section id="reviews" class="background plug">
        <h4 class="text">У нас пока нет отзывов :(</h4>
    </section>
<?php } ?>

<script src="/view/res/js/reviews_admin.js"></script>