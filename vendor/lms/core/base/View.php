<?php


namespace lms\base;


abstract class View
{

    public $route;
    public $contrller;
    public $view;
    public $prefix;
    public $model;

    public $template;

    public $data = [];   // datas from model
    public $meta = [];   // meta data

    public function __construct($route, string $template, $view, $meta)
    {

        $this->route = $route;
        $this->contrller = $route['controlller'];
        $this->view = $view;
        $this->prefix = $route['prefix'];
        $this->model = $route['controlller'];
        $this->meta = $meta;

        if ($template === false) {
            $this->template;
        } else {
            $this->template = $template ?: TEMPLATE;
        }

    }

}