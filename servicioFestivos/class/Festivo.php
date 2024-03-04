<?php
class Festivo
{
    private $id;
    private $dia;

    public function __construct($id, $dia = '')
    {
        $this->id = $id;
        $this->dia = $dia;
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
            $query = 'SELECT * FROM festivo';
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
            $query = 'INSERT INTO festivo(dia) VALUES(?)';
            $stmt = $link->prepare($query);
            $stmt->bindParam(1, $this->dia);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function borrar($link)
    {
        try {
            $query = 'DELETE FROM festivo WHERE dia =?';
            $stmt = $link->prepare($query);
            $stmt->bindParam(1, $this->dia);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return null;
        }
    }
}
