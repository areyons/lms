<?php


namespace lms;


class ErrorHandler
{

    public function __construct()
    {

        if (DEBUG) {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }

        set_exception_handler([$this, 'exceptionHandler']);   // overriding the standard error handler

    }

    // send error event info to logErrors and displayErrors methods

    public function exceptionHandler($event)
    {

        $this->logErrors($event->getMessage(), $event->getFile(), $event->getLine())->displayError('FATAL ERROR',
            $event->getMessage(), $event->getFile(), $event->getLine(), $event->getCode());

    }

    // writing errors in to log file /tmp/errors/errors.log

    protected function logErrors($message = '', $file = '', $string = '')
    {

        error_log("[" . date('Y-m-d H:i:s') . "] Error: {$message} | File: {$file} | String: {$string}\n==============\n", 3, ROOT . '/tmp/errors/errors.log');

    }

    // print errors method

    protected function displayError($errnum, $errstr, $errfile, $errline, $responce = 404)
    {

        http_response_code($responce);

        if ($responce == 404 && !DEBUG) {
            require WWW . '/404.php';
            die;
        }

        if (DEBUG) {
            include CORE .  '/base/errors.php';
        }

        return $this;
    }

}