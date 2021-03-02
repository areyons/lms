<?php


namespace lms;


class App
{

    public static $app;                                         // app settings container

    public function __construct()
    {

        session_start();                                        // session start

        new ErrorHandler();                                     // connect error handler

        $query = trim($_SERVER['QUERY_STRING'], '/');    // get query from url

        self::$app = Registry::instance();

        $this->getSettings();




    }
    protected function getSettings()
    {
        $settings = require_once CONFIG . '/settings.php';

        if (!empty($settings)) {
            foreach ($settings as $key => $value) {
                self::$app->setProperties($key, $value);
            }
        }
    }

}