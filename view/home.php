<section id="products">
    <div class="container row">
        <div class="block header">
            <h3 class="title">Продукты компании</h3>
            <p class="text">Основные наши направления − автоматизация бухгалтерского и управленческого учета на базе программных продуктов 1С, установка и обслуживание информационно-правового обеспечения ГАРАНТ, подбор и продажа системного и прикладного программного обеспечения.</p>
            <a href="/products/"><button class="btn">Все продукты</button></a>
        </div>

        <div class="block list">
            <?php foreach($PRODUCTS as $product): ?>
                <a class="item" href="/products/<?=$product['code_name']?>/">
                    <div class="image"><?=$product['icon']?></div>
                    <div class="content">
                        <h3 class="title"><?=$product['display_name']?></h3>
                        <p class="text"><?=$product['text']?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>