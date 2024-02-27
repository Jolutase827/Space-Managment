<?php
class Aula
{
    private $id;
    private $nombre;
    private $tipo;

    public function __construct($id, $nombre = '', $tipo = '')
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
    }

    public function __get($name)
    {
        if (property_exists(__CLASS__, $name)) {
            return $this->$name;
        }
        return null;
    }


    public function getAula($link)
    {
        try {
            $query = 'SELECT * FROM aulas WHERE id = ?';
            $stmt = $link->prepare($query);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }

    public function comprobeName($link)
    {
        try {
            $query = 'SELECT * FROM aulas WHERE nombre = ?';
            $stmt = $link->prepare($query);
            $stmt->bindParam(1, $this->nombre);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }

    public static function getAll($link)
    {
        try {
            $query = 'SELECT * FROM aulas';
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
            $query = 'INSERT INTO aulas(id,nombre,tipo) VALUES(?,?,?)';
            $stmt = $link->prepare($query);
            $stmt->bindParam(1, $this->id);
            $stmt->bindParam(2, $this->nombre);
            $stmt->bindParam(3, $this->tipo);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function update($link)
    {
        try {
            
            $query = ('UPDATE aulas SET  nombre=?, tipo=? WHERE id=?');
            $stmt = $link->prepare($query);
            $stmt->bindParam(1, $this->nombre);
            $stmt->bindParam(2, $this->tipo);
            $stmt->bindParam(3, $this->id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return $e;
        }
    }

    public function borrar($link)
    {
        try {
            $query = 'DELETE FROM aulas WHERE id =?';
            $stmt = $link->prepare($query);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return null;
        }
    }
}
