<section id="newreview">
    <div class="container">
        <div class="section-path"><a href="/">Главная</a> / <a href="/company/">О компании</a> / <a href="/company/reviews/" class="selection">Отзывы</a></div>
        <h3 class="section-title">Оставить отзыв</h3>
        <div class="content">
            <input type="text" placeholder="Имя" id="name_review">
            <textarea placeholder="Напишите Ваш отзыв" id="text_review" cols="30" rows="10"></textarea>
            <button class="btn" onclick="send_review()">Оставить отзыв</button>
        </div>
    </div>
</section>

<section id="reviews" class="background">
    <div class="container">
        <h3 class="section-title">Отзывы</h3>
        <div class="content">
            <?php 
            if($REVIEWS != null):
            foreach($REVIEWS as $review): ?>
            <div class="item">
                <h4 class="fullname"><?=$review['name']?> <span class="date"><?=$review['date']?></span></h4>
                <pre class="text"><?=$review['text']?></pre>
            </div>
            <?php endforeach; 
            endif;
            ?>
        </div>
    </div>
</section>

<script src="/view/res/js/reviews_user.js"></script>