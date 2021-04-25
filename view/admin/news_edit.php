<section id="new-article" >
    <div class="container">
        <div class="section-title">Редактирование статья</div>
        <form class="content" id="<?=$ARTICLE['id']?>">
            <input type="text" placeholder="Заголовок статьи" value="<?=$ARTICLE['title']?>" id="title_article">
            <textarea id="text_article" placeholder="Текст статьи" rows="10"><?=$ARTICLE['text']?></textarea>
            <label for="image_article">Изображение статьи (не загружайте, если не нужно менять)</label>
            <input type="file" id="image_article">
            <div id="image_preview" style="background-image: url('<?=$ARTICLE['image']?>');"></div>
            <button class="btn">Опубликовать</button>
            <button class="btn" id="delete_article">Удалить</button>
        </form>
    </div>
</section>

<script src="/view/res/js/news_edit_admin.js"></script>