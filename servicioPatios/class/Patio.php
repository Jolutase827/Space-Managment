<?php
class Patio
{
    private $id;
    private $hora;
    private $duracion;

    public function __construct($id,$hora='',$duracion='')
    {
        $this->id = $id;
        $this->hora = $hora;
        $this->duracion = $duracion;
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
            $query = 'SELECT * FROM patio';
            $stmt = $link->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return null;
        }
    }

    public function insert($link)
    {
        try {
            $query = 'INSERT INTO patio(hora,duracion) VALUES(?,?)';
            $stmt = $link->prepare($query);
            $stmt->bindParam(1, $this->hora);
            $stmt->bindParam(2, $this->duracion);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return null;
        }
    }
}
