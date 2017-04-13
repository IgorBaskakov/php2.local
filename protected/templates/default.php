<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новостная лента</title>
    <style>
        .lead {
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

    <section>
        <article>
            <h1>Новостная лента</h1>
            <hr>
            <div class="admin">
                <a href="/admin/Index/Default">
                    <button>Админ-панель</button>
                </a>
            </div>
            <hr>
            {% for article in articles %}
                <a href="/News/One/?id={{ article.id }}">
                    <h3>{{ article.title }}</h3>
                </a>
                <div class="lead">
                    {{ article.lead }}
                    <br>
                    {% if article.author is not null %}
                    <div>
                        <strong>
                            <em>
                                Автор:
                                {{ article.author.name }}
                            </em>
                        </strong>
                    </div>
                    {% endif %}
                </div>
            {% endfor %}
        </article>
    </section>

</body>
</html>