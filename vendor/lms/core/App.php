<?php


namespace lms;


class App
{

    public static $app;

    public function __construct()
    {

        session_start();                                        // session start

        $query = trim($_SERVER['QUERY_STRING'], '/');    // get query from url

        self::$app = Registry::instance();


    }

}