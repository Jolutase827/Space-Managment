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

    if (isset($_GET['aula_id'])) {
        $reserva = new Reserva('','',$_GET['aula_id']);
        $reservas = $reserva->getReserva($bd->link);
        header("HTTP/1.1 200 OK");
        echo json_encode($reservas);
        exit();
    }
    header("HTTP/1.1 200 OK");
    echo json_encode(Reserva::getAll($bd->link));
    exit();
}
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $body = json_decode(file_get_contents('php://input'), true);
        foreach ($body['reservas'] as $reservaBody) {
            $reserva = new Reserva($reservaBody['id'], $reservaBody['usuario_id'], $reservaBody['aula_id']);
            $reserva->insert($bd->link);
        }

        header("HTTP/1.1 200 OK");
        echo json_encode(true);
        exit();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        $body = json_decode(file_get_contents('php://input'), true);
        if(isset($body['grupo_id'])){
            Reserva::borrarByGroup($bd->link,$body['grupo_id']);
            header("HTTP/1.1 200 OK");
            echo json_encode("Borrado");
            exit();
        }
        $reserva = new Reserva($body['id'], '', '');
        $reserva->borrar($bd->link);
        header("HTTP/1.1 200 OK");
        echo json_encode("Borrado");
        exit();
    }

header("HTTP/1.1 400 Bad Request");
