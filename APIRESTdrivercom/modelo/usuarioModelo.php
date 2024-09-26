<?php
// Incluir el archivo de conexión a la base de datos
include 'bd/conexion.php';

class usuarioModelo {
    private $conn; // Variable para almacenar la conexión a la base de datos
    private $tabla; // Nombre de la tabla que se utilizará

    function __construct($tabla) {
        $conexion = new Conexion(); // Crear una instancia de la clase Conexion
        $this->conn = $conexion->obtenerConexion(); // Obtener la conexión a la base de datos
        $this->tabla = $tabla; // Asignar el nombre de la tabla
    }

    // Método para obtener registros por un campo entero
    function obtenerEntero($id, $campo) {
        // Preparar la consulta SQL
        $sentencia = $this->conn->prepare("SELECT * FROM " . $this->tabla . " WHERE " . $campo . " = :id");
        $sentencia->bindParam(':id', $id, PDO::PARAM_INT); // Vincular el parámetro
        $sentencia->execute(); // Ejecutar la consulta
        return $sentencia->fetchAll(PDO::FETCH_ASSOC); // Devolver todos los resultados como un array asociativo
    }

    // Método para obtener registros por un campo de texto
    function obtenerCadena($datos, $campo) {
        // Preparar la consulta SQL con LIKE para búsquedas parciales
        $sentencia = $this->conn->prepare("SELECT * FROM " . $this->tabla . " WHERE " . $campo . " LIKE CONCAT(:datos, '%')");
        $sentencia->bindParam(':datos', $datos, PDO::PARAM_STR); // Vincular el parámetro
        $sentencia->execute(); // Ejecutar la consulta
        return $sentencia->fetchAll(PDO::FETCH_ASSOC); // Devolver todos los resultados como un array asociativo
    }

    // Método para obtener todos los registros con paginación
    function obtenerTodas($page) {
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

    // Método para verificar el login de un usuario
    function verUsuario($us, $nu, $contra) {
        $sentencia = $this->conn->prepare("SELECT Estado, {$nu}, Contrasena FROM {$this->tabla} WHERE {$nu} = :us");
        $sentencia->bindParam(':us', $us, PDO::PARAM_STR); // Vincular el parámetro
        $sentencia->execute(); // Ejecutar la consulta
        $usuario = $sentencia->fetch(PDO::FETCH_ASSOC); // Obtener el usuario como un array asociativo

        if ($usuario && isset($usuario["Contrasena"])) {
            // Verificar si la contraseña proporcionada coincide con la almacenada
            if (password_verify($contra, $usuario["Contrasena"])) {
                return ['Estado' => $usuario['Estado'], 'Usuario' => $usuario[$nu]]; // Devolver estado y usuario
            } else {
                return ['error' => 'Usuario o contraseña incorrectos.']; // Mensaje de error si la contraseña no coincide
            }
        } else {
            return ['error' => 'datos incompletos.']; // Mensaje de error si el usuario no existe
        }
    }

    // Método para agregar un nuevo usuario
    function agregarUsuario($nombre, $email, $pass, $fcreacion, $creadopor, $rol_id, $fmodi) {
        // Preparar la consulta SQL para insertar un nuevo usuario
        $sentencia = $this->conn->prepare("INSERT INTO " . $this->tabla . " 
        (Nombre_Usuario, Correo_Electronico, Contrasena, Fecha_Creacion, Creado_Por, Estado, ID_Rol, Fecha_Modificacion) 
        VALUES (:nombre, :email, :pass, :fcreacion, :creadopor, 'Activo', :rol_id, :fmodi)");

        // Vincular los parámetros
        $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $sentencia->bindParam(':email', $email, PDO::PARAM_STR);
        $sentencia->bindParam(':pass', password_hash($pass, PASSWORD_BCRYPT), PDO::PARAM_STR); // Hash de la contraseña
        $sentencia->bindParam(':fcreacion', $fcreacion, PDO::PARAM_STR);
        $sentencia->bindParam(':creadopor', $creadopor, PDO::PARAM_STR);
        $sentencia->bindParam(':rol_id', $rol_id, PDO::PARAM_INT);
        $sentencia->bindParam(':fmodi', $fmodi, PDO::PARAM_STR);

        // Ejecutar la consulta e informar del resultado
        if ($sentencia->execute()) {
            return ['codigo' => 'Exito', 'mensaje' => 'Usuario agregado correctamente.'];
        } else {
            return ['error' => 'Error al agregar Usuario.']; // Mensaje de error si la inserción falla
        }
    }

    // Método para actualizar un usuario existente
    function actualizarUsuario($id_usuario, $nombre, $email, $pass, $fmodi, $estado) {
        // Preparar la consulta SQL para actualizar un usuario
        $sentencia = $this->conn->prepare("UPDATE " . $this->tabla . " SET 
        Nombre_Usuario = :nombre, 
        Correo_Electronico = :email, 
        Contrasena = :pass, 
        Estado = :estado, 
        Fecha_Modificacion = :fmodi 
        WHERE ID_Usuario = :id");

        // Vincular los parámetros
        $sentencia->bindParam(':id', $id_usuario, PDO::PARAM_INT);
        $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $sentencia->bindParam(':email', $email, PDO::PARAM_STR);
        $sentencia->bindParam(':pass', password_hash($pass, PASSWORD_BCRYPT), PDO::PARAM_STR); // Hash de la nueva contraseña
        $sentencia->bindParam(':estado', $estado, PDO::PARAM_STR);
        $sentencia->bindParam(':fmodi', $fmodi, PDO::PARAM_STR);

        // Ejecutar la consulta e informar del resultado
        if ($sentencia->execute()) {
            return ['mensaje' => 'Usuario actualizado correctamente.'];
        } else {
            return ['error' => 'Error al actualizar Usuario.']; // Mensaje de error si la actualización falla
        }
    }

    // Método para eliminar un usuario
    function eliminarUsuario($id_usuario) {
        // Preparar la consulta SQL para eliminar un usuario
        $sentencia = $this->conn->prepare("DELETE FROM " . $this->tabla . " WHERE ID_Usuario = :id");
        $sentencia->bindParam(':id', $id_usuario, PDO::PARAM_INT); // Vincular el parámetro

        // Ejecutar la consulta e informar del resultado
        if ($sentencia->execute()) {
            return ['mensaje' => 'Usuario eliminado correctamente.'];
        } else {
            return ['error' => 'Error al eliminar Usuario.']; // Mensaje de error si la eliminación falla
        }
    }
}
?>
