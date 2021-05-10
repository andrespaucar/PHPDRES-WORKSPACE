<?php
namespace App\Core;
use Buki\Router\Router;
use App\Core\Database;
class App {

    public function __construct() {
        
    }

    public function init()
    {
        $this->init_config();
        $this->init_database();
        $this->init_helpers();
        $this->init_sessions();
        $this->init_router();
    }

    private function init_database()
    {
       Database::connect();
    }

    private function init_router()
    {
        // $router = new Router([
        //     // 'base_folder' => __DIR__."/../",
        //     'paths' => [
        //         'controllers' => '../app/controllers',
        //         // 'middlewares' => '../app/middlewares',
        //     ],
        //     'namespaces' => [
        //         'controllers' => 'App\Controllers',
        //         // 'middlewares' => 'App\Middlewares',
        //     ],
        // ]);
        $path_config_router = require_once __DIR__."/../../config/routes.php";
        $router = new Router($path_config_router['config']);
        require_once  __DIR__."/../../routes/web.php"; 
        $router->group('api',function($router){
            require_once  __DIR__."/../../routes/api.php";
        });
        $router->error(function() {
            echo '<h1>404 Not Found</h1>';
            die();
          });
        $router->run();
    }

    private function init_helpers(){
        require_once __DIR__."../../core/functions/helpers.php";
    }

    private function init_sessions(){}

    private function init_config(){
        require_once  __DIR__."/../../config/app.php";
    }
}