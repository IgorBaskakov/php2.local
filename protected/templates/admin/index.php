<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новостная лента</title>
    <style>
        h1 {
            text-align: center;
        }
        .id {
            width: 40px;
            margin: 10px 50px 5px 10px;
            font-weight: bolder;
        }
        .title {
            width: 98%;
            margin: 10px 50px 5px 10px;
            padding: 10px;
            font-weight: bolder;
        }
        .lead {
            width: 98%;
            height: 200px;
            margin: 10px;
            padding: 10px;

        }
        .buttons {
            text-align: right;
            padding: 20px;
            margin: 15px;
        }
        .admin {
            text-align: right;
        }
    </style>
</head>
<body>

    <h1>Админская панель</h1>
    <hr>
    <div class="admin">
        <a href="/Index/Default"><button>Выйти из админ-панели</button></a>
    </div>
    <hr>

    <form action="/admin/Editing/Insert" method="post">
        <article>
            <h2>Добавить новость:</h2>
            <div>
                <input type="text" name="title" class='title'>
            </div>
            <div>
                <textarea name="lead" class='lead'></textarea>
            </div>
            <div class="buttons">
                <input type="submit" name="insert" value="Добавить">
            </div>
        </article>
    </form>

    <hr>
    <h2>Список новостей:</h2>
    <?php foreach ($table as $article) : ?>
        <?php
            foreach ($article as $resAction) :
                echo $resAction;
            endforeach;
        ?>
    <hr>
    <?php endforeach; ?>

</body>
</html>