<?php
// Incluir el archivo de conexión a la base de datos
include 'bd/conexion.php';

class prestamoModelo
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
    function agregarPrestamo($idequi, $idper, $idusu, $fpresta, $fdevo, $estado, $comentarios)
    {
        // Preparar la consulta SQL para insertar un nuevo usuario
        $sentencia = $this->conn->prepare("INSERT INTO " . $this->tabla . " 
        (ID_Equipo, ID_Persona, ID_Usuario, Fecha_Prestamo, Fecha_Devolucion, Estado, Comentarios) 
        VALUES (:idequi, :idperso, :idusu, :fprest, :fdevo, :estado, :comentario)");
        // Vincular los parámetros
        $sentencia->bindParam(':idequi', $idequi, PDO::PARAM_STR);
        $sentencia->bindParam(':idperso', $idper, PDO::PARAM_STR);
        $sentencia->bindParam(':idusu', $idusu, PDO::PARAM_STR);
        $sentencia->bindParam(':fprest', $fpresta, PDO::PARAM_STR);
        $sentencia->bindParam(':fdevo', $fdevo, PDO::PARAM_STR);
        $sentencia->bindParam(':estado', $estado, PDO::PARAM_STR);
        $sentencia->bindParam(':comentario', $comentarios, PDO::PARAM_STR);
        // Ejecutar la consulta e informar del resultado
        if ($sentencia->execute()) {
            return ['codigo' => 'Exito', 'mensaje' => 'Préstamo agregado correctamente.'];
        } else {
            return ['error' => 'Error al agregar Préstamo.']; // Mensaje de error si la inserción falla
        }
    }

    // Método para actualizar un usuario existente
    function actualizarPrestamo($id, $idequi, $idper, $idusu, $fpresta, $fdevo, $estado, $comentarios)
    {           
         // Preparar la consulta SQL para actualizar un usuario
        $sentencia = $this->conn->prepare("UPDATE " . $this->tabla . " SET 
                ID_Equipo = :idequi, ID_Persona = :idperso, ID_Usuario = :idusu, Fecha_Prestamo = :fprest,
                Fecha_Devolucion = :fdevo, Estado = :estado, Comentarios = :comentario
                WHERE ID_Prestamo = :id");
               
        // Vincular los parámetros
        $sentencia->bindParam(':id', $id, PDO::PARAM_INT);
        $sentencia->bindParam(':idequi', $idequi, PDO::PARAM_STR);
        $sentencia->bindParam(':idperso', $idper, PDO::PARAM_STR);
        $sentencia->bindParam(':idusu', $idusu, PDO::PARAM_STR);
        $sentencia->bindParam(':fprest', $fpresta, PDO::PARAM_STR);
        $sentencia->bindParam(':fdevo', $fdevo, PDO::PARAM_INT);
        $sentencia->bindParam(':estado', $estado, PDO::PARAM_STR);
        $sentencia->bindParam(':comentario', $comentarios, PDO::PARAM_STR);


        // Ejecutar la consulta e informar del resultado
        if ($sentencia->execute()) {
            return ['mensaje' => 'equipo del inventario actualizado correctamente.'];
        } else {
            return ['error' => 'Error al actualizar equipo del inventario.']; // Mensaje de error si la actualización falla
        }
    }

    // Método para eliminar un usuario
    function eliminarPrestamo($id)
    {
        // Preparar la consulta SQL para eliminar un usuario
        $sentencia = $this->conn->prepare("DELETE FROM " . $this->tabla . " WHERE ID_Prestamo = :id");
        $sentencia->bindParam(':id', $id, PDO::PARAM_INT); // Vincular el parámetro

        // Ejecutar la consulta e informar del resultado
        if ($sentencia->execute()) {
            return ['mensaje' => 'Presamo del inventario eliminado correctamente.'];
        } else {
            return ['error' => 'Error al eliminar el Prestamo del inventario.']; // Mensaje de error si la eliminación falla
        }
    }
}
