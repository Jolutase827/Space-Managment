<?php
    class Usuario{
        private $nombreUsuario;
        private $nombre;
        private $apellido;
        private $pwd;
        private $email;
        private $admin;

        public function __construct($nombreUsuario,$nombre = '',$apellido = '',$pwd,$email='',$admin) {
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

        


    }