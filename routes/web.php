<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Controllers\HomeController;
use App\Controllers\UserController;

use App\Controllers\Auth\{LoginController, RegisterController};
use App\Controllers\DashboardController;

/*
The patterns defined in PHP-Router are:
:all => All characters
:any => All chars without '/' char
:id => Digits
:number => Digits
:string => Alphanumeric characters
:slug => URL format characters for SEO. (Alphanumeric characters, _ and -)
:uuid => UUID
:date => Y-m-d format date string
? => optional
*/

// $router->get('/',function (Request $request,Response $response){
//     $response->setContent('Hello World');
//     return view('home');
// }); 

$router->get('/',[HomeController::class,'index']);
// AUTH
$router->get('login',[LoginController::class,'showlogin']);

$router->get('register',[RegisterController::class,'showRegister']);

// Restringir el Acceso
// $router->group('',function($router){
//     $router->get('/users',[UserController::class,'index']);

// },['before'=>Auth::class]);

$router->get('dashboard',[DashboardController::class,'index']);
$router->get('users',[UserController::class,'index']);
$router->post('auth/login',[LoginController::class,'login']);

$router->get('install',function(){
    echo 'Aqui se tiene que poner de manera dinamica para instalar la APP. asi como CMS wordpress.';
});