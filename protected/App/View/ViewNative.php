<?php

namespace App\View;

use App\AdminDataTable;

/**
 * Class ViewNative
 * @package App
 * @implements \Countable
 * @implements \Iterator
 */
class ViewNative extends ViewAbstract
{

    /**
     * @param string $template
     * @return string
     */
    public function render(string $template)
    {
        ob_start();
        foreach ($this as $key => $val) {
            $$key = $val;
        }
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

}