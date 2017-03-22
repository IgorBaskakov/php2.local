<html>
<head>
    <title><?= $article->title; ?></title>
    <style>
        article {
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
<h1><?= $article->title; ?></h1>
<article>
    <?= $article->lead; ?>
</article>
<div class="back">
    <a href="/index.php"><button>Назад</button></a>
</div>
</body>
</html>