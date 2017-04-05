<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новости</title>
</head>
<body>

    <section>
        <?php var_dump($this); ?>
        <?php foreach($this->articles as $item) : ?>
        <article>
            <h2><?php echo $item->title; ?></h2>
            <div><?php echo $item->lead; ?></div>
            <div>
                <strong>
                    <em>
                        <?php if (isset($item->author)) : ?>
                            Автор:
                            <?php echo $item->author->name;
                        endif; ?>
                    </em>
                </strong>
            </div>
        </article>
        <hr>
        <?php endforeach; ?>
    </section>

</body>
</html>