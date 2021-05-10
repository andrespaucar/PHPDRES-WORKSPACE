<?php
namespace App\Controllers;

use App\Core\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller{

    public function index(Request $request){
        return view('admin.dashboard.index');
    }
}