<?php
namespace App\Controllers\Auth;

use App\Core\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller{
    
    public function showRegister(){
        return view('auth.register');
    }
}