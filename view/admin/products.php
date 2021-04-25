<section id="products">
    <div class="container">
        <div class="section-title">Наша продукция</div>
    </div>
    
    <div class="container row">
        <a href="/admin/products/new/" class="block header new">
            <i class="fas fa-plus-square"></i>
        </a>

        <?php foreach($PRODUCTS as $product): ?>
            <a class="block header" href="/admin/products/<?=$product['code_name']?>/">
                <h3 class="title"><?=$product['display_name']?></h3>
                <p class="text"><?=$product['text']?></p>
            </a>
        <?php endforeach; ?>
    </div>
</section>