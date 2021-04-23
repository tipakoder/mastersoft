<?php if($NEWS != null){ ?>
    <section id="news">
        <div class="container">
            <div class="section-path"><a href="/">Главная</a> / <a href="/news/" class="selection">Новости</a></div>
            <div class="section-title">Новости</div>
            <div class="content">
                <?php foreach($NEWS as $article): ?>
                    <a class="item" href="/news/<?=$article['id']?>/">
                        <div class="image" style="background-image: url('<?=$article['image']?>');">
                            <div class="overlay"><?=$article['date']?></div>
                        </div>
                        <div class="title"><?=$article['title']?></div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php }else{ ?>
    <section id="news" class="background plug">
        <h4 class="text">У нас пока нет новостей :(</h4>
    </section>
<?php } ?>