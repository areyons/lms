<?php


namespace app\controllers;



class MainController extends AppController
{


    public function indexAction()
    {
        $this->setMeta('LMS', 'Learning Menagment System', 'menagment, lms');
        $this->setData(['name' => 'Andrew', 'age' => '20']);
    }

}