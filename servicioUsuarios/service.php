<?php
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