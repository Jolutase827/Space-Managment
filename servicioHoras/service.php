<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header("HTTP/1.1 200 OK");
die();
}
include('config/autocharge.php');
$bd = new Base();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header("HTTP/1.1 200 OK");
    echo json_encode(Hora::getAll($bd->link));
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $body = json_decode(file_get_contents('php://input'), true);
    $curo = new Hora('', $body['numero'], $body['espacio'],$body['inicio']);
    header("HTTP/1.1 200 OK");
    echo json_encode($curo->insert($bd->link));
    exit();
}


header("HTTP/1.1 400 Bad Request");
