<?php

use Philo\Blade\Blade;

function view($path, array $data=[]){

 $view = __DIR__.'/../../resources/views';
 $cache = __DIR__.'/../../bootstrap/cache';
$blade = new Blade($view,$cache);

echo $blade->view()->make($path,$data)->render();

}

function Make($filename, $data){



    extract($data);


    //turn on bufferigng
    ob_start();

    //include template

    include(__DIR__.'/../../resources/views/emails/'. $filename .'.php');

    //get the content of the file

    $content = ob_get_contents();


    //clean and erase buffering
    ob_end_clean();

    return $content;
}