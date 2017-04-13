<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новости</title>
</head>
<body>

    <section>
        {% for item in articles %}
        <article>
            <h2>{{ item.title }}</h2>
            <div>{{ item.lead }}</div>
            <div>
                <strong>
                    <em>
                        {% if item.author is not null %}
                            Автор:
                            {{ item.author.name }}
                        {% endif %}
                    </em>
                </strong>
            </div>
        </article>
        <hr>
        {% endfor %}
    </section>

</body>
</html>