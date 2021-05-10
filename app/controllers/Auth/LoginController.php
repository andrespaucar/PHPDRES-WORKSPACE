<?php
namespace App\Controllers\Auth;

use App\Core\Controller;
use App\Models\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Rakit\Validation\Validator;
use Symfony\Component\HttpFoundation\JsonResponse;

class LoginController extends Controller{
    private const KEYCRYPT = '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$';

    public function showLogin(){
        return view('auth.login');
    }

    public function login(Request $request):JsonResponse{
        $postData = json_decode($request->getContent(),true); 

        $validator = new Validator;
        $validator = $validator->validate($postData,[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // $validator->validate();
        if ($validator->fails()) {
            $errors = $validator->errors();
            // return new JsonResponse( $errors->firstOfAll());
            return new JsonResponse(
                ['success'=>false,
                'message'=>'Usuario o Contraseña son requeridos'
            ]);
        }
        
        $userData = User::where('email',$postData['email'])->first();
        if($userData && $this->check($postData['password'],$userData->password)){
            
            return new JsonResponse(['success'=>true],Response::HTTP_OK); 
        }
        return new JsonResponse(
            ['success'=>false,
            'message'=>'Usuario o Contraseña son incorrectos'
        ]);
        
        
          
    }
    private function check(string $password,string $passwordHash)
    {
        $haspass = crypt($password,self::KEYCRYPT);
        return $passwordHash === $haspass ? true:false;
    }

    private function loginOld(Request $request){
        // $username = $request->request->get('email');
        // $password = $request->request->get('password');
        // $validator = new Validator;
        // $validator = $validator->make($request->request->all(),[
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);
        // $validator->validate();
        // if ($validator->fails()) {
        //     $errors = $validator->errors();
            // echo "<pre>";
            // dd($errors->firstOfAll());
            // echo "</pre>";
            // exit;
        // }
        // return redirect($request);
        
        // $userData = User::where('email',$username)->first();
        // if($userData && $this->check($password,$userData->password)){
        //     dd($userData->name);
        // }
    }
}