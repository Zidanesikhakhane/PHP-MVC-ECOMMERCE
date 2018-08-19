<?php


/**
if not start session
 */
if(!isset($_SESSION)) session_start();
// start or load
require_once __DIR__.'/../app/config/_env.php';

//institiate database

new \App\classes\Database();

// set customer error handle

set_error_handler([new \App\classes\ErrorHandler(), 'handleErrors']);

require_once __DIR__.'/../app/routing/routes.php';

new \App\RouteDispatcher($router);

