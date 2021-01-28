<?php
//Функция, возвращает текст шаблона $page с подстановкой переменных
//из массива $params, содержимое шабона $page подставляется в
//переменную $content главного шаблона layout для всех страниц
//переменная $year для футера
function render($page, $params = []) {
    $year = date('Y');
    return renderTemplate(LAYOUTS_DIR . 'app', [
        'menu' => renderTemplate('menu', $params),
        'content' => renderTemplate($page, $params),
        'year' => $year
    ]);
}

//Функция возвращает текст шаблона $page с подставленными переменными из
//массива $params, просто текст
function renderTemplate($page, $params = []) {
    if ($params) {
        extract($params);
    }
//    foreach ($params as $key => $value) {
//        $$key = $value;
//    }
    ob_start();
    $fileName = TEMPLATES_DIR . $page . ".php";
    if (file_exists($fileName)) {
        include $fileName;
    }
    return ob_get_clean();
}