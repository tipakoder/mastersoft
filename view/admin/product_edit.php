<section id="product-new" for="<?=$PRODUCT['id']?>">
    <div class="container">
        <div class="section-title">Модерация продукта</div>

        <div class="block form">
            <input id="product_icon" type="text" placeholder="Иконка (просто текст или иконка с fontawesome)" value='<?=$PRODUCT['icon']?>'>
            <input id="product_displayname" type="text" placeholder="Публичное название продукта" value="<?=$PRODUCT['display_name']?>">
            <input id="product_codename" type="text" placeholder="Кодовое название продукта (например: po)" value="<?=$PRODUCT['code_name']?>">
            <textarea id="product_text" cols="30" rows="15" placeholder="Описание продукта"><?=$PRODUCT['text']?></textarea>
            <button class="btn" onclick="update_product()">Сохранить</button>
            <button class="btn" onclick="delete_product()">Удалить</button>
        </div>

        <div class="block services">
            <h3 class="title">Наши услуги <button onclick="new_service()"><i class="fas fa-plus"></i></button></h3>
            <div id="services_list" class="content row">
                <?php 
                if($SERVICES != null): 
                    foreach($SERVICES as $service): ?>
                    <div class="item" for="<?=$service['id']?>">
                        <div class="image_preview" style="background-image: url('<?=$service['image']?>')"></div>
                        <input class="input_name" type="text" placeholder="Название услуги" value="<?=$service['name']?>">
                        <button class="btn">Удалить</button>
                    </div>
                <?php endforeach;
                endif; ?>
            </div>
        </div>
    </div>
</section>

<script src="/view/res/js/product_admin.js"></script>