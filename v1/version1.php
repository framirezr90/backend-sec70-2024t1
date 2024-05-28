<?php

$_esquema = $_SERVER['REQUEST_SCHEME']; // acá se obtiene el esquena de la solcitud (thhp o https)
$_ubicacion = $_SERVER['HTTP_HOST']; // Aquí se obtiene la ubicación o el host de la solicitud (host)
$_metodo = $_SERVER['REQUEST_METHOD'];// nos va a indicar si es GET,POST, PUT,PATCH o DETELE.
$_path = $_SERVER['REQUEST_URI'];// Aquí se obtiene el camino o ruta de la solicitud después del host
$_partes = explode('/',$_path); //Esta línea divide la ruta en partes, utilizando '/' como el delimitador. Devuelve un arreglo con cada parte.
$_version = $_ubicacion == 'localhost' ? $_partes[2] : null; // Se verifica si la ubicación es 'localhost'. Si es así, se asigna el tercer elemento del arreglo de partes ($_partes[2]) a la variable $_version; de lo contrario, se asigna null.
$_mantenedor = $_ubicacion == 'localhost' ? $_partes[3] : null;
$_parametros = [];
$_parametros = $_ubicacion == 'localhost' ? $_partes[4] : null;

if(strlen($_parametros)>0){
    $_parametros = explode('?',$_parametros)[1];
    $_parametros = explode('&',$_parametros);

}else{
    $_parametros = [];
}

header("Access-Control-Allow-Origin: *"); // Restricción de acceso
header("Access-Control-Allow-Methods: GET, POST , PUT, PATH , DELETE");
header("Content-Type: Application/Json; charset=UTF-8");

//Autorizaciones mediante "Autorizathion Beaver"
$_header = null; 
try {
    $_header = isset(getallheaders()['Autorizathion']) ? getallheaders()['Autorizathion']: null;
    if ($_header == null){
        throw new Exception('No tiene autorización');
    }
} catch (Exception $e) {
    http_response_code(401);
    echo json_encode(['Error' => $e -> getMessage()]);
}

//Token
$_token_get = 'Bearer get';
$_token_post = 'Bearer post';
$_token_put = 'Bearer put';
$_token_patch = 'Bearer patch';
$_token_delete = 'Bearer delete';

