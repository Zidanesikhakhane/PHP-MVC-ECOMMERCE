<?php

$router=  new AltoRouter();

$router->map('GET','/', 'App\Controller\indexController@show', 'home');









