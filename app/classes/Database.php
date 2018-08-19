<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 6/16/2018
 * Time: 8:50 AM
 */

namespace App\classes;

use Illuminate\Database\Capsule\Manager as  Capsule;



class Database
{


    public function __construct()
    {

        $db = new Capsule;

        $db->addConnection([

            'driver'    => 'mysql',
            'host'      => env('DB_HOST', 'localhost'),
            'database'  => env('DB_DATABASE', 'store'),
            'username'  => env('DB_USERNAME', 'store'),
            'password'  => env('DB_PASSWORD', 'Zidane16.com'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
            'strict'    => false,

            ]);

        $db->setAsGlobal();
        $db->bootEloquent();

    }
}