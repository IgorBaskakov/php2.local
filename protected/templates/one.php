<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ title }}</title>
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
            <h1>{{ item.title }}</h1>
            <div class="lead">
                {{ item.lead }}
                <br>
                <br>
                {% if item.author is not null %}
                <div>
                    <strong>
                        <em>
                            Автор:
                            {{ item.author.name }}
                        </em>
                    </strong>
                </div>
                {% endif %}
            </div>
            <div class="back">
                <a href="/Index/Default">
                    <button>На главную страницу</button>
                </a>
            </div>
        </article>

</body>
</html>