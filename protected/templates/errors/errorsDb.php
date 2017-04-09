<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        h1 {
            text-align: center;
        }
        div {
            text-align: center;
        }
    </style>
    <title>Ошибка</title>
</head>
<body>
    <section>
        <h1>
            <?php
                echo $error->getMsg();
            ?>
        </h1>
        <div>
            <?php
                if (11 == $error->getCode()) {
                    echo 'Подождите немного и мы все исправим! :)';
                }
            ?>
        </div>
    </section>
</body>
</html>