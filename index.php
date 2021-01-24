<?php
define('TEMPLATES_DIR', 'templates/');
define('LAYOUTS_DIR', 'layouts/');

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}

$params = [
    'year' => date('Y')
];

// switch ($page) {
//     case 'index':
//         $params['name'] = 'Alex';
//         break;

//     case 'catalog':
//         $params['catalog'] = getCatalog();
//         break;

//     case 'apicatalog':
//         echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
//         die();
// }

echo render($page, $params);

// function getCatalog() {
//     return [
//         [
//             'name' => 'Пицца',
//             'price' => 24
//         ],
//         [
//             'name' => 'Чай',
//             'price' => 1
//         ],
//         [
//             'name' => 'Яблоко',
//             'price' => 12
//         ],
//     ];
// }

function render($page, $params = []) {
    return renderTemplate(LAYOUTS_DIR . 'app', [
        'menu' => renderTemplate('menu', $params),
        'content' => renderTemplate($page, $params)
    ]);
}

function renderTemplate($page, $params = []) {
    extract($params);
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