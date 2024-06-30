<?php

define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("PUBLIC_PATH", ROOT . '/public');
define("ERRORS_PATH", PUBLIC_PATH . '/errors');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/cvendor');
define("HELPERS", ROOT . '/vendor/cvendor/helpers');
define("CACHE", ROOT . '/tmp/cache');
define("LOGS", ROOT . '/tmp/logs');
define("CONFIG", ROOT . '/config');
define("LAYOUT", 'cshop');
define("PATH", 'http://localhost');
define("ADMIN", 'http://localhost/admin');
define("NO_IMAGE", 'uploads/no-image.jpg');

require_once ROOT . '/vendor/autoload.php';
