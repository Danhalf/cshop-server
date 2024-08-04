<?php

namespace cvendor;

class View
{

    public string $content = '';

    public function __construct(
        public $route,
        public $layout = '',
        public $view = '',
        public $meta = []
    )
    {
        if (false !== $this->layout) {
            $this->layout = $this->layout ?: LAYOUT;
        }
    }

    /**
     * @throws \Exception
     */
    public function render($data)
    {
        if (is_array($data)) {
            extract($data);
        }
        $prefix = str_replace('\\', '/', $this->route[ADMIN_PREFIX]);
        $view_file = VIEWS . "/$prefix{$this->route[CONTROLLER]}/$this->view.php";
        if (file_exists($view_file)) {
            ob_start();
            require_once $view_file;
            $this->content = ob_get_clean();
        } else {
            throw new \Exception("View $view_file not found", 500);
        }

        if (false !== $this->layout) {
            $layout_file = VIEWS . "/layouts/$this->layout.php";
            if (file_exists($layout_file)) {
                require_once $layout_file;
            } else {
                throw new \Exception("Layout $layout_file not found", 500);
            }
        }
    }

}