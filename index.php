<?php

define('DIRECTORY_ROOT', __DIR__ . DIRECTORY_SEPARATOR);

define('APP_PATH', DIRECTORY_ROOT . '/app/');

define('VIEWS_PATH', DIRECTORY_ROOT . '/resources/views/');

define('CONTROLLERS_PATH', DIRECTORY_ROOT . '/app/Http/Controllers/');

include_once(APP_PATH . 'Base/Bootstrap.php');

$app = new Bootstrap();

$app->run();
