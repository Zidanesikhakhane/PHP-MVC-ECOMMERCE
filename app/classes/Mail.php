<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 6/17/2018
 * Time: 12:36 PM
 */

namespace App\classes;

 use phpDocumentor\Reflection\Types\This;
 use PHPMailer;
class Mail
{

    protected $mail;

    public function __construct()
    {

        $this->mail = new PHPMailer\PHPMailer\PHPMailer;
        $this->setUp();
    }

    public function setUp(){


        $this->mail->isSMTP();
        $this->mail->Mailer = 'smtp';
        $this->mail->SMTPAuth= true;
        $this->mail->SMTPSecure = 'tls';

        $this->mail->Host = getenv('SMTP_HOST');
        $this->mail->Port = getenv('SMTP_PORT');

        $enviroment = getenv('APP_ENV');

        if($enviroment === 'local'){


            $this->mail->SMTPDebug = 2;

        }

        //info authe

        $this->mail->isHTML(true);
        $this->mail->SingleTo = true;



        $this->mail->Username = getenv('MAIL_USERNAME');
        $this->mail->Password = getenv('MAIL_PASSWORD');

        //sender authe

        $this->mail->From = getenv('ADMIN_EMAIL');
        $this->mail->FromName=getenv('quickover Store');


    }

    public function send($data){

       $this->mail->addAddress($data['to'],$data['name']);
       $this->mail->Subject = $data['subject'];
       $this->mail->body = Make($data['view'], array('data'=> $data['body'])) ;
       return $this->mail->send();

    }
}