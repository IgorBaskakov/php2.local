<html>
<head>
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
    <a href="/index.php"><button>Выйти из админ-панели</button></a>
</div>
<hr>
<form action="/admin/insert.php" method="post">
    <em><label>Добавить новость:</label></em>
    <div>
        <input type="text" name="title" class='title'>
    </div>
    <article>
        <textarea name="lead" class='lead'></textarea>
    </article>
    <div class="buttons">
        <input type="submit" name="insert" value="Добавить">
    </div>
</form>
<hr>
<em><label>Список новостей:</label></em>
<?php foreach ($news as $article):?>
<form action="/admin/update.php" method="post">
    <div>
        <input type="text" name="id" class="id" readonly value="<?= $article->id; ?>">
        <input type="text" name="title" class='title' value="<?= $article->title; ?>">
    </div>
    <article>
        <textarea name="lead" class='lead'><?= $article->lead; ?></textarea>
    </article>
    <input type="submit" name="update" value="Редактировать">
</form>
    <a href="/admin/delete.php?id=<?= $article->id; ?>"><button>Удалить</button></a>
<hr>
<?php endforeach; ?>
</body>
</html>