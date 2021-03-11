<?php


namespace lms\base;


abstract class Controller
{

    public $route;
    public $controller;
    public $view;
    public $prefix;
    public $model;

    public $template;

    public $data = [];   // datas from model
    public $meta = [];   // meta data

    public function __construct($route)
    {

        $this->route = $route;
        $this->controller = $route['controller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];
        $this->model = $route['controller'];


    }

    public function setData($data)
    {
        $this->data = $data;
    }


    public function setMeta($title = '', $desc = '', $keywords = '')
    {
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }

    public function getView()
    {
        $viewObject = new View($this->route, $this->template, $this->view, $this->meta);
        $viewObject->render($this->data);
    }
}