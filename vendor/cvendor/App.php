<?php

namespace cvendor;

class App
{

    public static Registry $app;

    public function __construct()
    {
        self::$app = Registry::getInstance();
        $this->getParams();
    }

    protected function getParams(): void
    {
        $paramsFile = CONFIG . '/params.php';

        if (file_exists($paramsFile)) {
            $params = require_once $paramsFile;
            if (!empty($params))
            {
                foreach ($params as $key => $value) {
                    self::$app->setProperty($key, $value);
                }
            }
        }
    }
}