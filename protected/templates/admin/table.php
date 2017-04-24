<table>
    <caption>Новости</caption>
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
        <?php
        $i = 1;
        foreach ($models as $model) : ?>
            <tr>
                <td>
                    <?php echo $i++; ?>
                </td>
                <?php foreach ($funcs as $func) : ?>
                    <td>
                        <?php echo $func($model); ?>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
</table>