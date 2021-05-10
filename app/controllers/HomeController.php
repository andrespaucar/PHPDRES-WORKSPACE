<?php
namespace App\Controllers;

use App\Core\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller{
    public function index()
    {
        $name = "ANDRES"; 
        return view('home',compact('name'));
    }
}