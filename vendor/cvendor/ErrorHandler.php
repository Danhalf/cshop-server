<?php

namespace cvendor;

use JetBrains\PhpStorm\NoReturn;

class ErrorHandler
{
    public function __construct()
    {
        if (DEBUG) {
            error_reporting(E_ERROR - 1);
        } else {
            error_reporting(0);
        }

        set_exception_handler([$this, 'exceptionHandler']);
        set_error_handler([$this, 'errorHandler']);
        ob_start();
        register_shutdown_function([$this, 'fatalErrorHandler']);
    }

    #[NoReturn] public function errorHandler(int $errno, string $errstr, string $errfile, int $errline): void
    {
        $this->logError($errstr, $errfile, $errline);
        $this->displayError($errno, $errstr, $errfile, $errline);
    }

    public function fatalErrorHandler(): void
    {
        $error = error_get_last();
        if (!empty($error) && $error['type'] & (E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR | E_USER_ERROR)) {
            $this->logError($error['message'], $error['file'], $error['line']);
            ob_end_clean();
            $this->displayError($error['type'], $error['message'], $error['file'], $error['line']);
        } else {
            ob_end_flush();
        }
    }

    #[NoReturn] public function exceptionHandler(\Throwable $exception): void
    {
        $this->logError($exception->getMessage(), $exception->getFile(), $exception->getLine());
        $this->displayError(
            'Error',
            $exception->getMessage(),
            $exception->getFile(),
            $exception->getLine(),
            $exception->getCode()
        );
    }

    protected function logError(string $errstr = '', string $errfile = '', string $errline = ''): void

    {

        $logDir = LOGS;
        if (!is_dir($logDir)) {
            mkdir($logDir, 0777, true);
        }

        $errorMessage = sprintf(
            "[%s] Error: %s | File: %s | Line: %s\n\n**************************\n\n",
            date('Y-m-d H:i:s'),
            $errstr,
            $errfile,
            $errline
        );

        $errorFile = LOGS . '/errors.log';

        file_put_contents(
            $logDir . '/errors.log',
            $errorMessage,
            FILE_APPEND
        );
    }

    #[NoReturn] protected function displayError(
        string $errno = '',
        string $errstr = '',
        string $errfile = '',
        string $errline = '',
        int    $responseCode = 500
    ): void
    {
        if ($responseCode == 0) {
            $responseCode = 404;
        }
        http_response_code($responseCode);

        if ($responseCode == 404 && !DEBUG) {
            require ERRORS_PATH . '/404.php';
            die;
        }

        if (DEBUG) {
            require ERRORS_PATH . '/development.php';
        } else {
            require ERRORS_PATH . '/production.php';
        }
        die;
    }
}
