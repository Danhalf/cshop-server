<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Development Error</title>
    <link rel="stylesheet" href="<?= ERRORS_PATH ?>/error.css">
</head>
<body>
<div class="error-container">
    <h1>Something went wrong!</h1>
    <h2>Development Mode</h2>
    <p>An error has occurred while processing your request.</p>
    <p><strong>Error Code:</strong> <?= $errno ?? 'N/A' ?></p>
    <p><strong>Error Message:</strong> <?= $errstr ?? 'N/A' ?></p>
    <p><strong>Error File:</strong> <?= $errfile ?? 'N/A' ?></p>
    <p><strong>Error Line:</strong> <?= $errline ?? 'N/A' ?></p>
</div>
</body>
</html>
