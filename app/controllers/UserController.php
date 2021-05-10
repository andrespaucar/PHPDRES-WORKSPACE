<?php
namespace App\Controllers;

use App\Core\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class UserController extends Controller{

    public function index(){
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }
}