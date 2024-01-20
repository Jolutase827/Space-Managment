<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header("Access-Control-Allow-Credentials: true");
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
    include('config/autocharge.php');
    $bd = new Base();
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['nombre'])&&isset($_GET['pwd'])){
            $usuario = new Usuario($_GET['nombre']);
            $usuario = $usuario->getUser($bd->link);
            if($usuario!=null){
                if(password_verify($_GET['pwd'],$usuario['password'])){
                    header("HTTP/1.1 200 OK");
                    echo json_encode($usuario);
                    exit();
                }
            }
            header("HTTP/1.1 200 OK");
            echo json_encode(null);
            exit();
        }
        header("HTTP/1.1 200 OK");
        echo json_encode(Usuario::getAll($bd->link));
        exit();
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $body = json_decode(file_get_contents('php://input'), true);
        $usuario = new Usuario($body['nombreUsuario'],$body['nombre'],$body['apellido'],password_hash($body['password'],PASSWORD_DEFAULT),$body['email']);
        if($usuario->comprobeNameAndEmail($bd->link)==null){
            $inserted = $usuario->insert($bd->link);
        }else{
            $inserted = null;
        }
        
        header("HTTP/1.1 200 OK");
        echo json_encode($inserted);
        exit();
    }
    header("HTTP/1.1 400 Bad Request");