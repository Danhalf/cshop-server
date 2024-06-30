<?php

namespace cvendor;

class App
{

    public static Registry $app;

    public function __construct()
    {
        $query = trim(urldecode($_SERVER['QUERY_STRING']), '/');
        new ErrorHandler();
        self::$app = Registry::getInstance();
        $this->getParams();
        Router::dispatch($query);
    }

    protected function getParams(): void
    {
        $paramsFile = CONFIG . '/params.php';

        if (file_exists($paramsFile)) {
            $params = require_once $paramsFile;
            if (!empty($params)) {
                foreach ($params as $key => $value) {
                    self::$app->setProperty($key, $value);
                }
            }

        }
    }


}
