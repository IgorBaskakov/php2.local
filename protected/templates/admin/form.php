<form action="/admin/Editing/Edit" method="post">
    <article>
        <div>
            <input type="text" name="id" class="id" readonly value="<?php echo $article->id; ?>">
            <input type="text" name="title" class='title' value="<?php echo $article->title; ?>">
        </div>
        <div>
            <textarea name="lead" class='lead'><?php echo $article->lead; ?></textarea>
            <br>
            <?php if (isset($article->author)) : ?>
            <div>
                <strong>
                    <em>
                        Автор:
                        <?php echo $article->author->name; ?>
                    </em>
                </strong>
            </div>
            <?php endif; ?>
            <br>
        </div>
        <input type="submit" name="update" value="Редактировать">
    </article>
</form>