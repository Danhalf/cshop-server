<?php

namespace cvendor;

abstract class Controller
{

    private array $data = [];
    public array $meta = [];
    public false|string $layout = '';
    public string $view = '';
    public object $model;

    public function __construct(public $route = [])
    {
    }

    public function getModel(): void
    {
        $model = 'app\models\\' . $this->route[ADMIN_PREFIX] . $this->route[CONTROLLER];
        if (class_exists($model)) {
            $this->model = new $model;
        }
    }

    public function getView(): void
    {
        $this->view = $this->view ?: $this->route[ACTION];
        (new View($this->route, $this->layout, $this->view, $this->meta))->render($this->data);
    }


    public function get(): array
    {
        return $this->data;
    }

    public function set($data): void
    {
        $this->data = $data;
    }

    public function setMeta($title, $description, $keywords): void
    {
        $this->meta = [
            'title' => $title ?: '',
            'description' => $description ?: '',
            'keywords' => $keywords ?: '',
        ];
    }

}