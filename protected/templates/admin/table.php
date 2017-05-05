<table>
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
            <td><a href="/admin/Index/Update/?id=<?php echo $model->id; ?>">Изменить</a></td>
            <td><a href="/admin/Editing/Delete/?id=<?php echo $model->id; ?>">Удалить</a></td>
        </tr>
    <?php endforeach; ?>
</table>