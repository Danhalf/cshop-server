<?php

require_once dirname(__DIR__) . '/config/init.php';

if (PHP_MAJOR_VERSION < LOWER_PHP_VERSION) {
    die('The required major php version is not lower than ' . LOWER_PHP_VERSION);
}

new \cvendor\App();
echo \cvendor\App::$app->getProperty('siteName');
var_dump(\cvendor\App::$app->getProperties());