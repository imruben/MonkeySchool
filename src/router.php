<?php
include 'routes.php';
/**
 * Undocumented function
 *
 * @return void
 */

//recoge la ruta de la url con un 'request' al server
//y si no esta en el array de 'routes.php' devuelve un error
function getRoute(array $routes): string
{
    if (isset($_REQUEST['url'])) {
        $url = $_REQUEST['url'];
    } else {
        $url = 'home';
    }

    if (in_array($url, (array)$routes)) {
        return $url;
    } else {
        return 'error';
    }
    /*
        foreach($routes as $ruta){
            if($ruta==$url){
                return $url;
            }
        }
        switch($url){
            case 'login':
                return 'login';
            default:
                return 'home';
        }
        */
}
