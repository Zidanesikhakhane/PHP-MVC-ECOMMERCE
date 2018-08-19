<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 6/15/2018
 * Time: 9:33 AM
 */

namespace App\Controller;


use App\classes\Mail;

class indexController extends baseController
{

 Public function show(){


     echo "  ";

     $mail = new Mail();

     $data = [

         'to'=>'support@devscreencast.com',
         'subject'=>'Welcome to ecommerce',
         'view'=>'Welcome',
         'name'=>'Zidane Sikhakhane',
         'body'=>"this is the test"

     ];

     if($mail->send($data)){


         echo "send succefully";

     }

     else{


         echo "fail to send  ";
     }
 }

}