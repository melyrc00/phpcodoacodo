<?php ob_start();
$conexion = mysqli_connect("localhost", "id22387101_mrcpeliculas2024", "Naruto07@", "id22387101_peliculas2024");
if (mysqli_connect_errno()) {
    echo "ERROR no se conectó: " . mysqli_connect_error();
} else {
    echo "Se conectó de manera correcta";
}
echo "<br>";
// Insertar datos desde formulario de registro
if ($_POST) {
        // Verificar si las variables están definidas y no están vacías
        if (isset($_POST['name'], $_POST['apellido'], $_POST['fecha-nacimiento'], $_POST['email'], $_POST['password']) &&
            !empty($_POST['name']) && !empty($_POST['apellido']) && !empty($_POST['fecha-nacimiento']) && !empty($_POST['email']) && !empty($_POST['password'])) {
            $nombre = $_POST['name'];
            $apellido = $_POST['apellido'];
            $fechanac = $_POST['fecha-nacimiento'];
            $correo = $_POST['email'];
            $password = $_POST['password'];

            $insertarDatos = "INSERT INTO usuarios (nombre, apellido, email, contraseña, fecha_nac) VALUES ('$nombre', '$apellido', '$correo', '$password', '$fechanac')";

                if (mysqli_query($conexion, $insertarDatos)) {
                    echo "Datos insertados correctamente";
                    header("Location: reciberegistro.php");
                } else {
                    echo "Error ingresando datos: " . mysqli_error($conexion);
                }
        } else {
            echo "Error: faltan datos del formulario o algunos campos están vacíos";
        }
} else {
    echo "Error: no se recibieron datos del formulario";
}

echo "<br>";

// Consulta para mostrar los datos de usuarios
$consultas = mysqli_query($conexion, "SELECT * FROM usuarios");

// Verificar si la consulta fue exitosa
if ($consultas) {
    // Mostrar los resultados
    while ($lista = mysqli_fetch_assoc($consultas)) {
        print_r ($lista);
        echo "<br>";
    }
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}

echo "<br>";

// Mostrar información del objeto de resultado
var_dump($consultas);

// Cerrar conexión a la base de datos
mysqli_close($conexion);
?>


?>
