<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ошибка</title>
    <style>
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>
        <?php
            foreach ($errors as $error) :
                echo $error->getMessage();
        ?>
        <br>
        <?php
            endforeach;
        ?>
    </h1>

    <a href="/admin/Index/Default"><button>Назад</button></a>

</body>
</html>
