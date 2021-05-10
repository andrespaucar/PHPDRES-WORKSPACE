<?php
//Spanish_Peru
date_default_timezone_set('America/Lima');
setlocale(LC_ALL, 'Spanish_Peru.1250');

# PONER '/sjsistempro' si el proyecto esta en una carpeta
// $uri = urldecode( parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
// if ($uri !== '/') {// /public
//     // return false;
//     $uri = '/phpdres/public'.'/';
// }else{
//     $uri = '/';
// }
define('BASEPATH_ROUTE', env('PRODUCTION')? '/':'/'); 


define('URL', env('PRODUCTION')?
    "https://".$_SERVER['SERVER_NAME'].'/'  :
    'http://'.$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'].BASEPATH_ROUTE 
);


define('DS'         , DIRECTORY_SEPARATOR);
define('ROOT'       , dirname(__DIR__) . DS);

// DIRECTORY PUBLIC : rutas relativas
define('PUBLIC_P'   , URL);

/*
error_reporting(E_ALL); // E_ERROR | E_WARNING | E_PARSE | E_NOTICE | 0
return[
    'timezone' => 'America/Lima',//'UTC',
]
*/
