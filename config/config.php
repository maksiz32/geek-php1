<?php
define('ROOT', dirname(__DIR__));
define('TEMPLATES_DIR', '../templates/');
define('LAYOUTS_DIR', 'layouts/');
define('DIR_ROOT', $_SERVER['DOCUMENT_ROOT']);

define('DB_HOST', 'localhost');
define('DB_PORT', '3306');
define('DB_DATABASE', 'site');
define('DB_USERNAME', 'site');
define('DB_PASSWORD', '12345');

include ROOT . "/engine/db_connections.php";
// include ROOT . "/config/menu.php";
include ROOT . "/models/menu.php";
include ROOT . "/engine/controller.php";
include ROOT . "/engine/functions.php";
//include ROOT . "/models/catalog.php";
include ROOT . "/models/gallery.php";
include ROOT . "/engine/classSimpleImage.php";
include ROOT . "/models/math.php";
include ROOT . "/models/products.php";
include ROOT . "/models/feedbacks.php";
include ROOT . "/models/users.php";
include ROOT . "/models/basket.php";
include ROOT . "/engine/log.php";