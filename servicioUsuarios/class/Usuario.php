<?php
    class Usuario{
        private $nombreUsuario;
        private $nombre;
        private $apellido;
        private $pwd;
        private $email;
        private $admin;

        public function __construct($nombreUsuario,$nombre = '',$apellido = '',$pwd='',$email='',$admin='') {
            $this->nombreUsuario = $nombreUsuario;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->pwd = $pwd;
            $this->email = $email;
            $this->admin = $admin;
        }

        public function __get($name){
            if(property_exists(__CLASS__,$name)){
                return $this->$name;
            }
            return null;
        }

        
        public function getUser($link){
            try{
                $query = 'SELECT * FROM usuarios WHERE nombreUsuario = ?';
                $stmt = $link->prepare($query);
                $stmt->bindParam(1,$this->nombreUsuario);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                return null;
            }
        }

    }