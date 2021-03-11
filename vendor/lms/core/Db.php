<?php


namespace lms;



class Db
{
    use TSingletone;

    protected function __construct()
    {

        \R::setup(Registry::getProperty('db_dsn'), Registry::getProperty('db_user'), Registry::getProperty('db_pass'));


    }
}