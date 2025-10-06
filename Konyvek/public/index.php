<?php
 
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Author.php';
require_once __DIR__ . '/../models/Book.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Publisher.php';
require_once __DIR__ . '/../controllers/AuthorController.php';
require_once __DIR__ . '/../controllers/BookController.php';
require_once __DIR__ . '/../controllers/CategoryController.php';
require_once __DIR__ . '/../controllers/PublisherController.php';
 
use Controllers\AuthorController;
use Controllers\BookController;
use Controllers\CategoryController;
use Controllers\PublisherController;
 
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);
 
if (count($uri) < 2 || $uri[1] == '') {
    require_once __DIR__ . '/../views/home/index.php';
    exit();
}
 
$resource = $uri[1];
$action = isset($uri[2]) ? $uri[2] : 'index';
$id = isset($uri[3]) ? $uri[3] : null;
 
switch ($resource) {
    case 'books':
        $controller = new BookController();
        break;
    case 'authors':
        $controller = new AuthorController();
        break;
    case 'categories':
        $controller = new CategoryController();
        break;
    case 'publishers':
        $controller = new PublisherController();
        break;
    default:
        http_response_code(404);
        echo "Not Found";
        exit();
}
 
switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'show':
        if ($id) $controller->show($id);
        break;
    case 'create':
        $controller->create();
        break;
    case 'edit':
        if ($id) $controller->edit($id);
        break;
    case 'delete':
        if ($id) $controller->delete($id);
        break;
    default:
        http_response_code(404);
        echo "Action Not Found";
}