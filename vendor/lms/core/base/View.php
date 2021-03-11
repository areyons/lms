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
        $this->view = $view;   // action
        $this->prefix = $route['prefix'];
        $this->model = $route['controller'];
        $this->meta = $meta;

        // check that $template dont false
        if (false === $template) {
            $this->template;
        } else {
            $this->template = $template ?: TEMPLATE;
            
        }

    }

    public function render($data)
    {
        // create vars form $datas array
        if(is_array($data)) {
            extract($data);
        }

        //get current view
        $viewFile = APP . "/views/{$this->prefix}{$this->controller}/{$this->view}.php";

        //if view exist - connect it
        if(is_file($viewFile)) {

            // start bufferisation and save view
            ob_start();
            require_once $viewFile;

            // get current buffer contents and delete current output buffer
            $content = ob_get_clean();

        } else {
            throw new \Exception("View: $viewFile - not found", 404);
        }

        // connect current template
        if(false !== $this->template) {
            $templateFile = APP . "/views/templates/{$this->template}.php";

            if(is_file($templateFile)) {
                require_once $templateFile;
            } else {
                throw new \Exception("Template: $this->template - not found", 404);
            }
        }
    }

    public function getMeta()
    {
        return $this->meta;
    }

}