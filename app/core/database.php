<?php

namespace App\Core;
use Illuminate\Database\Capsule\Manager as DB;

use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Database{
    private static $_db;

    public static function connect(){
        // if(!self::$_db){
            $capsule = new DB;
            $dbconfig = require(__DIR__."/../../config/database.php");
            $defaultConfig = $dbconfig['default'];
            $capsule -> addConnection($dbconfig['connections'][$defaultConfig]);
            // Set the event dispatcher used by Eloquent models... (optional)
            $capsule->setEventDispatcher(new Dispatcher(new Container));
            // Make this Capsule instance available globally via static methods... (optional)
            $capsule->setAsGlobal();
            // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
            $capsule->bootEloquent();
        //     self::$_db = true;
        // }
        
        // return  self::$_db;
    }
}