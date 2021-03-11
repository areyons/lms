<?php


namespace lms\base;

use lms\Db;

abstract class Model
{

     public $atributes = [];
     public $errors = [];
     public $rules = [];

     public function __construct()
     {

        Db::instance();

     }

}