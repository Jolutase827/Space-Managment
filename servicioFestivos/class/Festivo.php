<?php
class Festivo
{
    private $id;
    private $nombre;
    private $dia;

    public function __construct($id, $nombre = '', $dia = '')
    {
        $this->id = $id;
        $this->nombre = $nombre;
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
            $query = 'INSERT INTO festivo(nombre,dia) VALUES(?,?)';
            $stmt = $link->prepare($query);
            $stmt->bindParam(1, $this->nombre);
            $stmt->bindParam(2, $this->dia);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function borrar($link)
    {
        try {
            $query = 'DELETE FROM festivo WHERE id =?';
            $stmt = $link->prepare($query);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return null;
        }
    }
}
