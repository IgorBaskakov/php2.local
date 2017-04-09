<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $item->title; ?></title>
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

        <article>
            <h1><?php echo $item->title; ?></h1>
            <div class="lead">
                <?php echo $item->lead; ?>
                <br>
                <br>
                <?php if (isset($item->author)) : ?>
                <div>
                    <strong>
                        <em>
                            Автор:
                            <?php echo $item->author->name; ?>
                        </em>
                    </strong>
                </div>
                <?php endif; ?>
            </div>
            <div class="back">
                <a href="/Index/Default">
                    <button>Назад</button>
                </a>
            </div>
        </article>

</body>
</html>