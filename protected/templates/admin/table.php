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
        </tr>
    <?php endforeach; ?>
</table>