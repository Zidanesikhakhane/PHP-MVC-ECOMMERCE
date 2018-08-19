<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 6/18/2018
 * Time: 1:33 PM
 */

namespace App\classes;


class ErrorHandler
{




    public function errorHandler($error_Number, $error_Message, $error_File,$error_Line){

        $error = "[{$error_Number}] An Error has occured in file {$error_File} on file {$error_Line}: {$error_Message}";


        $enviroment = getenv('APP_ENV');

        if($enviroment==='local'){

            $whoops = new \Whoops\Run;
            $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
            $whoops->register();

        }
        else{

     $data =[
         'to'=>getenv('ADMIN_EMAIL'),
         'subject'=>'System Error',
         'view'=>'Error',
         'name'=>'Admin',
         'body'=>$error

            ];

    ErrorHandler::emailAdmin($data)->outputFriendlyError();

        }


    }
    public function outputFriendlyError(){


        ob_end_clean();
        view('errors/generic');
        exit;
    }
    public  function emailAdmin($data){


        $mail = new Mail;
        $mail->send();
        return new static;
    }


}