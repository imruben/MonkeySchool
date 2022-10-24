<?php

/**
 * render templates
 *
 * @param string $tpl
 * @return string
 */

//recibe el nombre del tpl y un array con variables y las pasa a esa tpl
function render(string $tpl, array $data = []): string
{
    if ($data) {
        extract($data, EXTR_OVERWRITE);
    }
    ob_start();
    require 'src/templates/' . $tpl . '.tpl.php';
    $rendered = ob_get_clean();
    return (string)$rendered;
}
