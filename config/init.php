<?php

define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("PUBLIC", ROOT . '/public');
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
define("LOWER_PHP_VERSION", 8);

require_once ROOT . '/vendor/autoload.php';
