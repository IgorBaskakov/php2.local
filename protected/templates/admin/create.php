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
        .title {
            width: 96%;
            margin: 10px 50px 5px 10px;
            padding: 10px;
            font-weight: bolder;
        }
        .lead {
            width: 96%;
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

    <h1>Добавить новость</h1>
    <hr>
    <div class="admin">
        <a href="/admin/Index/Default"><button>Назад</button></a>
    </div>
    <hr>

    <form action="/admin/Editing/Insert" method="post">
        <article>

            <div>
                <span>Заголовок новости:</span>
                <input type="text" name="title" class='title'>
            </div>
            <div>
                <span>Содержание новости:</span>
                <textarea name="lead" class='lead'></textarea>
            </div>
            <div class="buttons">
                <input type="submit" name="insert" value="Добавить">
            </div>
        </article>
    </form>

</body>
</html>