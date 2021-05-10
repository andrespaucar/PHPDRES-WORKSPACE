<?php
 
use App\Core\Libs\Template\Blade;
// use App\Core\Csrf;
use Symfony\Component\HttpFoundation\Request;
// VIEW
if(!function_exists('view')){
    function view(string $page,array $data = []){
        $blade = new Blade('../resources/views', '../storage/views');
        
       $blade->directive('authenticate', function ($expression) {
            return "<?php if($expression): ?>";
        });
        $blade->directive('endauthenticate', function () {
            return "<?php endif; ?>";
        });
        $blade->directive('public', function ($expression) {
            return "<?php if($expression): ?>";
        });
        $blade->directive('endpublic', function () {
            return "<?php endif; ?>";
        });
  
        echo $blade->render($page,$data);
    }
}

// REQUEST
if(!function_exists('request')){
    function request(){
        
    }
}
// RESPONSE
if(!function_exists('response')){
    function response(){

    }
}
// ASSET
if(!function_exists('asset')){
    function asset(string $str){
        return PUBLIC_P.$str;
    }
}

// CSRF_FIELD
if(!function_exists('csrf_field')){
    function csrf_field(){
        return '<input type="hidden" name="_token" value="'.csrf_token().'" />';
    }
}

// CSRF_TOKEN
if(!function_exists('csrf_token')){
    function csrf_token(){
        // return Csrf::csrf_token();
    }
}

// BACK
if(!function_exists('back')){
    function back(){
        if(isset($_SERVER['HTTP_REFERER'])){
            header('Location: ' . $_SERVER["HTTP_REFERER"]);
        }
    }
}
// REDIRECT
if(!function_exists('redirect')){
    function redirect(Request $request){ 
        header('Location: '.$request->headers->get('referer'), true, 301);
        exit();
    }
}
if(!function_exists('redirectTo')){
    function redirectTo($str){ 
        header('Location: '.$str, true, 301);
        exit();
    }
}

// DD
if(!function_exists('dd')){
    function dd($str){
        dump($str);
    }
}
// DD
if(!function_exists('isActive')){
    function isActive($str){
        $request_uri = trim(rawurldecode($_SERVER['REQUEST_URI']),'/');
        return ($request_uri  === trim($str,'/'))? true: false;
    }
}
if(!function_exists('is')){
    function is($str){
        $request_uri = trim(rawurldecode($_SERVER['PATH_INFO']),'/');
        return ($request_uri === trim($str,'/'))? true: false;
    }
}


// PARA CALCULAR TIEMPO DE RESPUESTA
// Use al inicicio y al final de codigo a calculat poner la funcion
/* Example
    timequery();
    ...... 
    timequery(); 
*/
if(!function_exists('timequery')){
    function timequery(){
        static $querytime_begin;
        list($usec, $sec) = explode(' ',microtime());
         
        if(!isset($querytime_begin))
        {   
            $querytime_begin= ((float)$usec + (float)$sec);
        }
        else
        {
            $querytime = (((float)$usec + (float)$sec)) - $querytime_begin;
            echo sprintf('<br />La consulta tardó %01.5f segundos.- <br />', $querytime);
        }
    }
}