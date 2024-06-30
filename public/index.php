<?php

require_once dirname(__DIR__) . '/config/init.php';
require_once dirname(__DIR__) . '/config/constants.php';

require_once HELPERS . '/functions.php';
require_once CONFIG . '/routes.php';

if (PHP_MAJOR_VERSION < LOWER_PHP_VERSION) {
    die('The required major php version is not lower than ' . LOWER_PHP_VERSION);
}

new \cvendor\App();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= PUBLIC_PATH ?>/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="32x32" href="
    /favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="
    /favicon/favicon-16x16.png">
    <title>CShop</title>
</head>
<body>
CONTENT
<?php

debug(\cvendor\Router::getRoutes());
debug(ADMIN_PREFIX);

?>

</body>
</html>
