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

    if (isset($_GET['id'])) {
        $aula = new Aula($_GET['id'],'','');
        $aula = $aula->getAula($bd->link);
        header("HTTP/1.1 200 OK");
        echo json_encode($aula);
        exit();
    }
    header("HTTP/1.1 200 OK");
    echo json_encode(Aula::getAll($bd->link));
    exit();
}
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $body = json_decode(file_get_contents('php://input'), true);
        $aula = new Aula(date('MM-dd-aaaa hh:mm:ss tt'), $body['nombre'], $body['tipo']);
        if ($aula->comprobeName($bd->link) == null) {
            $inserted = $aula->insert($bd->link);
        } else {
            $inserted = null;
        }

        header("HTTP/1.1 200 OK");
        echo json_encode($inserted);
        exit();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        $body = json_decode(file_get_contents('php://input'), true);
        $aula = new Aula($body['id'], '', '');
        $aula->borrar($bd->link);
        header("HTTP/1.1 200 OK");
        echo json_encode("Borrado");
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        $body = json_decode(file_get_contents('php://input'), true);
        $aula = new Aula($body['id'], $body['nombre'], $body['tipo']);
        if($aula->comprobeName($bd->link) == null){
            $aula->update($bd->link);
            header("HTTP/1.1 200 OK");
            echo json_encode(true);
           
        }else{
            header("HTTP/1.1 200 OK");
            echo json_encode(false);
        }
        exit();
    }
header("HTTP/1.1 400 Bad Request");
