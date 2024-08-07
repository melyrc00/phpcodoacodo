<?php ob_start();
$conexion = mysqli_connect("localhost", "id22387101_mrcpeliculas2024", "Naruto07@", "id22387101_peliculas2024");
if (mysqli_connect_errno()) {
    echo "ERROR no se conectó: " . mysqli_connect_error();
} else {
    // echo "Se conectó de manera correcta";
}


// Insertar datos desde formulario de registro
if ($_POST) {
    // Verificar si las variables están definidas y no están vacías
    if (
        isset($_POST['name'], $_POST['apellido'], $_POST['fecha-nacimiento'], $_POST['email'], $_POST['password']) &&
        !empty($_POST['name']) && !empty($_POST['apellido']) && !empty($_POST['fecha-nacimiento']) && !empty($_POST['email']) && !empty($_POST['password'])
    ) {
        $nombre = $_POST['name'];
        $apellido = $_POST['apellido'];
        $fechanac = $_POST['fecha-nacimiento'];
        $correo = $_POST['email'];
        $password = $_POST['password'];
        $insertarDatos = "INSERT INTO usuarios (nombre, apellido, email, contraseña, fecha_nac) VALUES ('$nombre', '$apellido', '$correo', '$password', '$fechanac')";
        if (mysqli_query($conexion, $insertarDatos)) {
            // echo "Datos insertados correctamente";
            // Obtener el ID del último registro insertado
            $ultimo_id = mysqli_insert_id($conexion);
            header("Location: reciberegistro.php?id=$ultimo_id");
            exit();
        } else {
            echo "Error ingresando datos: " . mysqli_error($conexion);
        }
    } else {
        echo "Error: faltan datos del formulario o algunos campos están vacíos";
    }
}



// Mostrar datos del usuario recién registrado
if (isset($_GET['id'])) {
    // Obtener el ID del usuario 
    $id_usuario = $_GET['id'];
    $consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE id_usuarios = '$id_usuario'");
    if ($consulta) {
        $lista = mysqli_fetch_assoc($consulta);
    } else {
        echo "Error en la consulta: " . mysqli_error($conexion);
        exit();
    }
}
mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" type="text/css">
    <link rel="stylesheet" href="styles-registro.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d7f8f62978.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>CAC-MOVIES</title>
</head>

<body>
    <header class="nav-princ">
        <nav>
            <a href="index.html" id="logo-princ" class="animate__swing">
                <i class="fa-solid fa-film" style="color: #ffffff;"></i>
                <p>CAC-Movies</p>
            </a>
        </nav>
    </header>
    <main id="registro-princ" class="section-buscador">
        <h1>Usuario registrado correctamente</h1>

        <article class="animate__zoomIn" id="form_reg">

        <table >
                <thead>

                  <tr>

                  
                    <th >Nombre</th>
                    <th >Apellido</th>
                    <th >Correo</th>
                  </tr>
                </thead>
                <tbody>

                  <tr>
                    <th><?php echo $lista["nombre"]?></th>
                    <td><?php echo $lista["apellido"]?></td>
                    <td><?php echo $lista["email"]?></td>
                   



                  </tr>
                </tbody>
              </table>

        </article>

        <a href="index.html"><button class="boton-sec">Volver</button></a>

    </main>
    <footer class="nav-princ">
        <ul>
            <a href="">
                <li>Términos y condiciones</li>
            </a>
            <a href="">
                <li>Preguntas frecuentes</li>
            </a>
            <a href="">
                <li>Ayuda</li>
            </a>
            <a href="administrar.html">
                <li>Administrar peliculas</li>
            </a>
        </ul>
    </footer>


</body>

</html>