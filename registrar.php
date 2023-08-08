<?php
// Obtener los datos enviados desde el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['contraseña'];

    // Realizar cualquier validación o procesamiento adicional que desees

    // Conexión a la base de datos (ajusta los valores según tu configuración)
    $host = 'localhost';
    $usuario = 'root';
    $contrasena = '';
    $nombreBaseDatos = 'bidinggame';

    $conexion = mysqli_connect($host, $usuario, $contrasena, $nombreBaseDatos);

    // Verificar si la conexión fue exitosa
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Consulta SQL para insertar los datos en la tabla
    $consulta = "INSERT INTO usuarios (nombre, email, contraseña) VALUES ('$nombre', '$email', md5('$password'))";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $consulta)) {
        echo "Registro exitoso. Los datos se han guardado en la base de datos.";
    } else {
        echo "Error en el registro: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
}
?>
