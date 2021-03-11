<?php


namespace lms;



class Db
{
    use TSingletone;

    protected function __construct()
    {

        class_alias('\RedBeanPHP\R', '\R');

        \R::setup(Registry::getProperty('db_dsn'), Registry::getProperty('db_user'), Registry::getProperty('db_pass'));

        if(!\R::testConnection()) {
            throw new \Exception('DB connection failed', 500);
        } else {
            echo 'connected';
        }


    }
}