<section id="products">
    <div class="container">
        <div class="section-path"><a href="/">Главная</a> / <a href="/products/" class="selection">Продукция</a></div>
        <div class="section-title">Наша продукция</div>
    </div>
    
    <div class="container row">
        <?php foreach($PRODUCTS as $product): ?>
            <div class="block header">
                <h3 class="title"><?=$product['display_name']?></h3>
                <p class="text"><?=$product['text']?></p>
                <a href="/products/<?=$product['code_name']?>/"><button class="btn">Подробнее</button></a>
            </div>
        <?php endforeach; ?>
    </div>
</section>