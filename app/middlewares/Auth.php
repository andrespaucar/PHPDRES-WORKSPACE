<?php

namespace App\Middlewares;
use Buki\Router\Http\Middleware;
use Symfony\Component\HttpFoundation\Request;

class Auth extends Middleware{

    public function handle(Request $request){
        echo 'GOGO MIDDLEWARE <br>';die();
        return true;
    }

    public static function login(string $user,string $password){}
}