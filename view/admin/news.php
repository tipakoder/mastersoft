<section id="news">
    <div class="container">
        <div class="section-title">Новости</div>
        <div class="content">
            <a class="item new" href="/admin/news/new/">
                <i class="fas fa-plus-square"></i>
            </a>

            <?php if($NEWS != null):  
                foreach($NEWS as $article):
            ?>
            <a class="item" href="/admin/news/<?=$article['id']?>/edit/">
                <div class="image" style="background-image: url('<?=$article['image']?>');">
                    <div class="overlay"><?=$article['date']?></div>
                </div>
                <div class="title"><?=$article['title']?></div>
                </a>

            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<script src="/view/res/js/reviews_admin.js"></script>