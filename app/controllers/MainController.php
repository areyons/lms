<?php


namespace app\controllers;



class MainController extends AppController
{


    public function indexAction()
    {
        $this->setMeta('LMS', 'Learning Menagment System', 'menagment, lms');

        $test = \R::findAll('test');

        $this->setData(compact('test'));

    }

}