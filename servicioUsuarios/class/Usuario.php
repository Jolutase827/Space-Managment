<?php
class Usuario
{
    private $nombreUsuario;
    private $nombre;
    private $apellido;
    private $pwd;
    private $email;
    private $admin;

    public function __construct($nombreUsuario, $nombre = '', $apellido = '', $pwd = '', $email = '', $admin = '')
    {
        $this->nombreUsuario = $nombreUsuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->pwd = $pwd;
        $this->email = $email;
        $this->admin = $admin;
    }

    public function __get($name)
    {
        if (property_exists(__CLASS__, $name)) {
            return $this->$name;
        }
        return null;
    }


    public function getUser($link)
    {
        try {
            $query = 'SELECT * FROM usuarios WHERE nombreUsuario = ?';
            $stmt = $link->prepare($query);
            $stmt->bindParam(1, $this->nombreUsuario);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }

    public function comprobeNameAndEmail($link)
    {
        try {
            $query = 'SELECT * FROM usuarios WHERE nombreUsuario = ? OR email = ?';
            $stmt = $link->prepare($query);
            $stmt->bindParam(1, $this->nombreUsuario);
            $stmt->bindParam(2, $this->email);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }
    public function comprobeUpdate($link){
        try {
            $query = 'SELECT * FROM usuarios WHERE nombreUsuario != ? AND email = ?';
            $stmt = $link->prepare($query);
            $stmt->bindParam(1, $this->nombreUsuario);
            $stmt->bindParam(2, $this->email);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }
    public static function getAll($link)
    {
        try {
            $query = 'SELECT * FROM usuarios WHERE nombreUsuario != "root"';
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
            $query = 'INSERT INTO usuarios(nombreUsuario,nombre,apellido,password,email) VALUES(?,?,?,?,?)';
            $stmt = $link->prepare($query);
            $stmt->bindParam(1, $this->nombreUsuario);
            $stmt->bindParam(2, $this->nombre);
            $stmt->bindParam(3, $this->apellido);
            $stmt->bindParam(4, $this->pwd);
            $stmt->bindParam(5, $this->email);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return null;
        }
    }

    public function update($link)
    {
        try {
            if ($this->pwd != '') {
                $query = ('UPDATE usuarios SET   password=?,nombre=?, apellido=?, email=? WHERE nombreUsuario=?');
                $stmt = $link->prepare($query);
                $stmt->bindParam(1, $this->pwd);
                $stmt->bindParam(2, $this->nombre);
                $stmt->bindParam(3, $this->apellido);
                $stmt->bindParam(4, $this->email);
                $stmt->bindParam(5, $this->nombreUsuario);
            } else {
                $query = ('UPDATE usuarios SET  nombre=?, apellido=?, email=? WHERE nombreUsuario=?');
                $stmt = $link->prepare($query);
                $stmt->bindParam(2, $this->nombre);
                $stmt->bindParam(3, $this->apellido);
                $stmt->bindParam(4, $this->email);
                $stmt->bindParam(5, $this->nombreUsuario);
            }
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return $e;
        }
    }

    public function borrar($link)
    {
        try {
            $query = 'DELETE FROM usuarios WHERE nombreUsuario =?';
            $stmt = $link->prepare($query);
            $stmt->bindParam(1, $this->nombreUsuario);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return null;
        }
    }
}
