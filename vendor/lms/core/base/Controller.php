<?php


namespace lms\base;


abstract class Controller
{

    public $route;
    public $contrller;
    public $model;
    public $view;
    public $prefix;

    public $data = [];   // datas from model
    public $meta = [];   // meta data


}