<?php
include("config/databaseconfig.php");
    class Base{
        private $link;

        public function __construct(){
            try{
                $this->link = new PDO("mysql:host=".HOST.";dbname=".BASE,USUARIO,PASS,OPCIONES);
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function __get($name){
            if(property_exists(__CLASS__, $name)){
                return $this->$name;
            }
            return null;
        }


    }