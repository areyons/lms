<?php

use lms\Router;

// default routes for admin side app

Router::addRoute('^adm$', ['controller' => 'Main', 'action' => 'index', 'prefix' => 'adm']);

Router::addRoute('^adm/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'adm']);

// default routes for user side app

Router::addRoute('^$', ['controller' => 'Main', 'action' => 'index']);

Router::addRoute('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');




// ^ - begin of url string,
// $ - end of url string