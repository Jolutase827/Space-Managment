<?php
class Reserva
{
    private $id;
    private $usuario_id;
    private $aula_id;

    public function __construct($id, $usuario_id = '', $aula_id = '')
    {
        $this->id = $id;
        $this->usuario_id = $usuario_id;
        $this->aula_id = $aula_id;
    }

    public function __get($name)
    {
        if (property_exists(__CLASS__, $name)) {
            return $this->$name;
        }
        return null;
    }


    public function getReserva($link)
    {
        try {
            $query = 'SELECT * FROM reservas WHERE aula_id = ?';
            $stmt = $link->prepare($query);
            $stmt->bindParam(1, $this->aula_id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return null;
        }
    }

    public function comprobeName($link)
    {
        try {
            $query = 'SELECT * FROM reservas WHERE usuario_id = ?';
            $stmt = $link->prepare($query);
            $stmt->bindParam(1, $this->usuario_id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }

    public static function getAll($link)
    {
        try {
            $query = 'SELECT * FROM reservas';
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
            $query = 'INSERT INTO reservas(id,usuario_id,aula_id) VALUES(?,?,?)';
            $stmt = $link->prepare($query);
            $stmt->bindParam(1, $this->id);
            $stmt->bindParam(2, $this->usuario_id);
            $stmt->bindParam(3, $this->aula_id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function update($link)
    {
        try {
            
            $query = ('UPDATE reservas SET  usuario_id=?, aula_id=? WHERE id=?');
            $stmt = $link->prepare($query);
            $stmt->bindParam(1, $this->usuario_id);
            $stmt->bindParam(2, $this->aula_id);
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
            $query = 'DELETE FROM reservas WHERE id =?';
            $stmt = $link->prepare($query);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return null;
        }
    }
    public static function borrarByGroup($link,$grupo_id)
    {
        try {
            $query = 'DELETE FROM reservas WHERE grupo_id = ?';
            $stmt = $link->prepare($query);
            $stmt->bindParam(1, $grupo_id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return null;
        }
    }
}
