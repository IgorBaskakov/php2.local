<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новости не найдены!</title>
    <style>
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>
        <?php
            echo $error->getMsg();
        ?>
    </h1>

    <a href="/Index/Default"><button>Вернуться на главную страницу</button></a>

</body>
</html>
