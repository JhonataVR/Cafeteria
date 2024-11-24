<?php
class Conexion {
    private $host = 'localhost';
    private $db = 'cafeteria';
    private $user = 'root';
    private $pass = '';
    private $conn;

    public function conectar() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db,3307);
        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
        return $this->conn;
    }
}
?>
