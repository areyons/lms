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

        self::$app = Registry::instance();                      // put settings in to the $app container

        $this->getSettings();                                   // get settings

        Router::dispatch($query);                               // sent query to the router


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