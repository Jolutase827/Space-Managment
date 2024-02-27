<?php
class Curso
{
    private $id;
    private $inicio;
    private $fin;

    public function __construct($id, $inicio = '', $fin = '')
    {
        $this->id = $id;
        $this->inicio = $inicio;
        $this->fin = $fin;
    }

    public function __get($name)
    {
        if (property_exists(__CLASS__, $name)) {
            return $this->$name;
        }
        return null;
    }




    public static function get($link)
    {
        try {
            $query = 'SELECT * FROM curso';
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
            $query = 'INSERT INTO curso(inicio,fin) VALUES(?,?)';
            $stmt = $link->prepare($query);
            $stmt->bindParam(1, $this->inicio);
            $stmt->bindParam(2, $this->fin);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function borrar($link)
    {
        $this->deleteCurso($link);
        $this->deleteFestivo($link);
        $this->deleteHora($link);
        $this->deletePatio($link);
        return true;
    }
    public function deleteCurso($link){
        try {
            $query = 'DELETE FROM curso ';
            $stmt = $link->prepare($query);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return null;
        }
    }
    public function deleteHora($link){
        try {
            $query = 'DELETE FROM horas ';
            $stmt = $link->prepare($query);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return null;
        }
    }
    public function deleteFestivo($link){
        try {
            $query = 'DELETE FROM festivo ';
            $stmt = $link->prepare($query);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return null;
        }
    }
    public function deletePatio($link){
        try {
            $query = 'DELETE FROM patio ';
            $stmt = $link->prepare($query);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return null;
        }
    }
    
}
