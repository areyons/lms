<?php


namespace lms\base;


class View
{

    public $route;
    public $controller;
    public $view;
    public $prefix;
    public $model;

    public $template;

    public $data = [];   // datas from model
    public $meta = [];   // meta data

    public function __construct($route, $template, $view, $meta)
    {

        $this->route = $route;
        $this->controller = $route['controller'];
        $this->view = $view;
        $this->prefix = $route['prefix'];
        $this->model = $route['controller'];
        $this->meta = $meta;

        if ($template === false) {
            $this->template;
        } else {
            $this->template = $template ?: TEMPLATE;

            
        }

    }

    public function render($data)
    {

        echo $viewFile = APP . "/views/{$this->prefix}{$this->controller}/{$this->view}.php";

    }

}