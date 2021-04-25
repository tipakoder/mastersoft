<section id="product-new">
    <div class="container">
        <div class="section-title">Добавление нового продукта</div>

        <div class="block form">
            <input id="product_icon" type="text" placeholder="Иконка (просто текст или иконка с fontawesome)">
            <input id="product_displayname" type="text" placeholder="Публичное название продукта">
            <input id="product_codename" type="text" placeholder="Кодовое название продукта (например: po)">
            <textarea id="product_text" cols="30" rows="15" placeholder="Описание продукта"></textarea>
            <button class="btn" onclick="save_product()">Сохранить</button>
        </div>
    </div>
</section>

<script src="/view/res/js/product_admin.js"></script>