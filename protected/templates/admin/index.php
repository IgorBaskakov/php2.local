<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table, td, th {
            border: 2px solid black;
        }
        h1 {
            text-align: center;
        }
        table caption {
            font-size: larger;
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

    </style>
    <title>Админ панель</title>
</head>
<body>
    <h1>Админская панель</h1>
    <hr>
    <div class="admin">

        <a href="/admin/Index/Create"><button>Добавить новость</button></a>
        <a href="/Index/Default"><button>Выйти из админ-панели</button></a>

    </div>
    <hr>
    <?php
        $funcs = include __DIR__ . '/../../functions.php';
        $adminDataTable = new \App\AdminDataTable($articles, $funcs);

        $table = $adminDataTable->render();
    ?>

    <table>
        <caption>Новости</caption>
        <?php
            $i = 0;
            foreach ($table as $article) : ?>
                <?php if (0 === $i) : ?>
                    <tr>
                        <th>
                            №
                        </th>
                        <th>
                            Заголовок
                        </th>
                        <th>
                            Содержание новости
                        </th>
                        <th>
                            Автор
                        </th>
                        <th colspan="2">
                            Действия
                        </th>
                    </tr>
                <?php endif; ?>

                <tr>
                    <td>
                        <?php echo ++$i; ?>
                    </td>
                    <?php foreach ($article as $item) : ?>
                        <td>
                            <?php echo $item; ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
    </table>

</body>
</html>