<?php
    $menu = renderTemplate('menu');
    echo renderTemplate('layout', $menu);

    function renderTemplate($page, $content = []) {
        ob_start();
        include $page . ".php";
        return ob_get_clean();
    }