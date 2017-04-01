<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новостная лента</title>
    <style>
        .lead {
            margin: 10px auto 5px;
            padding: 5px;
            width: 90%;
            border: 1px solid blue;
        }
        h1, h3 {
            text-align: center;
        }
        .admin {
            text-align: right;
        }
    </style>
</head>
<body>

    <section>
        <article>
            <h1>Новостная лента</h1>
            <hr>
            <div class="admin">
                <a href="/admin/index.php">
                    <button>Админ-панель</button>
                </a>
            </div>
            <hr>
            <?php foreach ($this->articles as $item) : ?>
                <a href="/article.php?id=<?php echo $item->id; ?>">
                    <h3><?php echo $item->title; ?></h3>
                </a>
                <div class="lead">
                    <?php echo $item->lead; ?>
                    <br>
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
                </div>
            <?php endforeach; ?>
        </article>
    </section>

</body>
</html>