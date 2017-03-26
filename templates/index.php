<html>
<head>
    <title>Новостная лента</title>
    <style>
        article {
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
<h1>Новостная лента</h1>
<hr>
<div class="admin">
    <a href="/admin/index.php"><button>Админ-панель</button></a>
</div>
<hr>
<?php foreach ($news as $article):?>
    <a href="/article.php?id=<?= $article->id; ?>"><h3><?= $article->title; ?></h3></a>
    <article>
        <?= $article->lead; ?>
    </article>
<?php endforeach; ?>
</body>
</html>