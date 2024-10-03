<?php
class Conexion {
    private $conn;
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "drivercom";

    // Constructor que inicializa la conexión
    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("set names utf8");
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            die();
        }
    }

    // Método para obtener la conexión
    public function obtenerConexion() {
        return $this->conn;
    }

    // Cerrar la conexión (opcional)
    public function cerrarConexion() {
        $this->conn = null;
    }
}
?>
