<?php
define('BASE_PATH', __DIR__.'/../');
require '../vendor/autoload.php';
require '../core/yyf/App.php';

$config = array_merge(
    require '../config/main.php',
    require '../config/main_local.php'
);

Core\Yyf\App::run($config);
return require 'router.php';

