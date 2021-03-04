<?php


namespace lms\base;


abstract class Controller
{

    public $route;
    public $contrller;
    public $view;
    public $prefix;
    public $model;

    public $data = [];   // datas from model
    public $meta = [];   // meta data

    public function __construct($route)
    {

        $this->route = $route;
        $this->contrller = $route['controlller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];
        $this->model = $route['controlller'];

    }

    public function setData($data)
    {
        $this->data = $data;
    }


    public function setMeta(array $meta = [])
    {
        $this->meta = $meta;
    }

}