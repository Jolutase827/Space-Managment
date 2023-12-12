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
    header("HTTP/1.1 400 Bad Request");