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
    if (isset($_GET['nombre']) && isset($_GET['pwd'])) {
        $usuario = new Usuario($_GET['nombre']);
        $usuario = $usuario->getUser($bd->link);
        if ($usuario != null) {
            if (password_verify($_GET['pwd'], $usuario['password'])) {
                header("HTTP/1.1 200 OK");
                echo json_encode($usuario);
                exit();
            }
        }
        header("HTTP/1.1 200 OK");
        echo json_encode(null);
        exit();
    }
    if (isset($_GET['root']) && isset($_GET['nombre'])) {
        $usuario = new Usuario($_GET['nombre']);
        $usuario = $usuario->getUser($bd->link);
        header("HTTP/1.1 200 OK");
        echo json_encode($usuario);
        exit();
    }
    header("HTTP/1.1 200 OK");
    echo json_encode(Usuario::getAll($bd->link));
    exit();
}
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $body = json_decode(file_get_contents('php://input'), true);
        $usuario = new Usuario($body['nombreUsuario'], $body['nombre'], $body['apellido'], password_hash($body['password'], PASSWORD_DEFAULT), $body['email']);
        if ($usuario->comprobeNameAndEmail($bd->link) == null) {
            $inserted = $usuario->insert($bd->link);
        } else {
            $inserted = null;
        }

        header("HTTP/1.1 200 OK");
        echo json_encode($inserted);
        exit();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        $body = json_decode(file_get_contents('php://input'), true);
        $usuario = new Usuario($body['nombreUsuario'], '', '', '', '');
        $usuario->borrar($bd->link);
        header("HTTP/1.1 200 OK");
        echo json_encode("Borrado");
        exit();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        $body = json_decode(file_get_contents('php://input'), true);
        $usuario = new Usuario($body['nombreUsuario'], $body['nombre'], $body['apellido'], password_hash($body['password'], PASSWORD_DEFAULT), $body['email']);
        if ($usuario->comprobeUpdate($bd->link)==null) {
            $usuario->update($bd->link);
            header("HTTP/1.1 200 OK");
            echo json_encode(true);
        } else {
            header("HTTP/1.1 200 OK");
            echo json_encode(false);
        }
        exit();
    }
header("HTTP/1.1 400 Bad Request");
