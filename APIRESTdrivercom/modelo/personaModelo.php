<?php
// Incluir el archivo de conexión a la base de datos
include 'bd/conexion.php';

class personaModelo
{
    private $conn; // Variable para almacenar la conexión a la base de datos
    private $tabla; // Nombre de la tabla que se utilizará

    function __construct($tabla)
    {
        $conexion = new Conexion(); // Crear una instancia de la clase Conexion
        $this->conn = $conexion->obtenerConexion(); // Obtener la conexión a la base de datos
        $this->tabla = $tabla; // Asignar el nombre de la tabla
    }

    // Método para obtener registros por un campo entero
    function obtenerEntero($id, $campo)
    {
        // Preparar la consulta SQL
        $sentencia = $this->conn->prepare("SELECT * FROM " . $this->tabla . " WHERE " . $campo . " = :id");
        $sentencia->bindParam(':id', $id, PDO::PARAM_INT); // Vincular el parámetro
        $sentencia->execute(); // Ejecutar la consulta
        return $sentencia->fetchAll(PDO::FETCH_ASSOC); // Devolver todos los resultados como un array asociativo
    }

    // Método para obtener registros por un campo de texto
    function obtenerCadena($datos, $campo)
    {
        // Preparar la consulta SQL con LIKE para búsquedas parciales
        $sentencia = $this->conn->prepare("SELECT * FROM " . $this->tabla . " WHERE " . $campo . " LIKE CONCAT(:datos, '%')");
        $sentencia->bindParam(':datos', $datos, PDO::PARAM_STR); // Vincular el parámetro
        $sentencia->execute(); // Ejecutar la consulta
        return $sentencia->fetchAll(PDO::FETCH_ASSOC); // Devolver todos los resultados como un array asociativo
    }

    // Método para obtener todos los registros con paginación
    function obtenerTodas($page)
    {
        if ($page > 0) {
            $offset = ($page - 1) * 50; // Calcular el desplazamiento para la paginación
            $sentencia = $this->conn->prepare("SELECT * FROM " . $this->tabla . " LIMIT 50 OFFSET :offset");
            $sentencia->bindParam(':offset', $offset, PDO::PARAM_INT); // Vincular el parámetro
            $sentencia->execute(); // Ejecutar la consulta
            return $sentencia->fetchAll(PDO::FETCH_ASSOC); // Devolver todos los resultados como un array asociativo
        } else {
            return ['error' => 'Número de página incorrecto.']; // Mensaje de error si el número de página es inválido
        }
    }


    // Método para agregar un nuevo usuario
    function agregarPersona($nom, $ndoc, $tele, $email, $dir)
    {
        // Preparar la consulta SQL para insertar un nuevo usuario
        $sentencia = $this->conn->prepare("INSERT INTO " . $this->tabla . " 
        (Nombre_Completo, Numero_Documento, Telefono, Correo, Direccion) 
        VALUES (:nombre, :ndoc, :tel, :email, :dir)");
        // Vincular los parámetros
        $sentencia->bindParam(':nombre', $nom, PDO::PARAM_STR);
        $sentencia->bindParam(':ndoc', $ndoc, PDO::PARAM_STR);
        $sentencia->bindParam(':tel', $tele, PDO::PARAM_STR);
        $sentencia->bindParam(':email', $email, PDO::PARAM_STR);
        $sentencia->bindParam(':dir', $dir, PDO::PARAM_STR);
        // Ejecutar la consulta e informar del resultado
        if ($sentencia->execute()) {
            return ['codigo' => 'Exito', 'mensaje' => 'Usuario agregado correctamente.'];
        } else {
            return ['error' => 'Error al agregar Usuario.']; // Mensaje de error si la inserción falla
        }
    }


    // Método para actualizar un usuario existente
    function actualizarPersona($id, $nom, $ndoc, $tele, $email, $dir)
    {
        // Preparar la consulta SQL para actualizar un usuario
        $sentencia = $this->conn->prepare("UPDATE " . $this->tabla . " SET Nombre_Completo = :nombre, 
        Numero_Documento = :ndoc, Telefono = :tel, Correo = :email, Direccion = :dir WHERE ID_Persona = :id");

        // Vincular los parámetros
        $sentencia->bindParam(':id', $id, PDO::PARAM_INT);
        $sentencia->bindParam(':nombre', $nom, PDO::PARAM_STR);
        $sentencia->bindParam(':ndoc', $ndoc, PDO::PARAM_STR);
        $sentencia->bindParam(':tel', $tele, PDO::PARAM_STR);
        $sentencia->bindParam(':email', $email, PDO::PARAM_STR);
        $sentencia->bindParam(':dir', $dir, PDO::PARAM_STR);


        // Ejecutar la consulta e informar del resultado
        if ($sentencia->execute()) {
            return ['mensaje' => 'equipo del inventario actualizado correctamente.'];
        } else {
            return ['error' => 'Error al actualizar equipo del inventario.']; // Mensaje de error si la actualización falla
        }
    }

    // Método para eliminar un usuario
    function eliminarPersona($id)
    {
        // Preparar la consulta SQL para eliminar un usuario
        $sentencia = $this->conn->prepare("DELETE FROM " . $this->tabla . " WHERE ID_Persona = :id");
        $sentencia->bindParam(':id', $id, PDO::PARAM_INT); // Vincular el parámetro

        // Ejecutar la consulta e informar del resultado
        if ($sentencia->execute()) {
            return ['mensaje' => 'equipo del inventario eliminado correctamente.'];
        } else {
            return ['error' => 'Error al eliminar el equipo del inventario.']; // Mensaje de error si la eliminación falla
        }
    }
}
