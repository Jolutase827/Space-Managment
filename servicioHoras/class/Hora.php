<?php
class Hora
{
    private $id;
    private $numero;
    private $espacio;
    private $inicio;

    public function __construct($id,$numero='',$espacio='', $inicio = '')
    {
        $this->id = $id;
        $this->numero = $numero;
        $this->espacio = $espacio;
        $this->inicio = $inicio;
    }

    public function __get($name)
    {
        if (property_exists(__CLASS__, $name)) {
            return $this->$name;
        }
        return null;
    }




    public static function getAll($link)
    {
        try {
            $query = 'SELECT * FROM horas';
            $stmt = $link->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }

    public function insert($link)
    {
        try {
            $query = 'INSERT INTO horas(numero,espacio,inicio) VALUES(?,?,?)';
            $stmt = $link->prepare($query);
            $stmt->bindParam(1, $this->numero);
            $stmt->bindParam(2, $this->espacio);
            $stmt->bindParam(3, $this->inicio);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
