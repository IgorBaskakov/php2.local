<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $article->title; ?></title>
    <style>
        .lead {
            margin: 10px auto 5px;
            padding: 5px;
            width: 70%;
            border: 1px dotted green;
        }
        h1, h3 {
            margin: 5px auto 5px;
            text-align: center;
            width: 70%;
        }
        .back {
            width: 85%;
            margin: 10px;
            padding: 10px;
            text-align: right;
        }
    </style>
</head>
<body>

    <section>
        <article>
            <h1><?php echo $this->article->title; ?></h1>
            <div class="lead">
                <?php echo $this->article->lead; ?>
                <br>
                <br>
                <div>
                    <strong>
                        <em>
                            <?php if (isset($this->article->author)) : ?>
                                Автор:
                                <?php echo $this->article->author->name;
                            endif; ?>
                        </em>
                    </strong>
                </div>
            </div>
            <div class="back">
                <a href="/index.php">
                    <button>Назад</button>
                </a>
            </div>
        </article>
    </section>

</body>
</html>