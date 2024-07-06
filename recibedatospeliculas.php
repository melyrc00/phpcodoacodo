<?php ob_start();
$conexion = mysqli_connect("localhost", "id22387101_mrcpeliculas2024", "Naruto07@", "id22387101_peliculas2024");

if ($_POST) {
    if (mysqli_connect_errno()) {
        echo "ERROR no se conectó: " . mysqli_connect_error();
        exit();
    }

    // Insertar datos desde formulario de registro
    if (
        isset($_POST['titulopelicula'], $_POST['descripcion'], $_POST['genero'], $_POST['calificacion'], $_POST['aniopelicula'], $_POST['director'])
        && !empty($_POST['titulopelicula']) && !empty($_POST['descripcion']) && !empty($_POST['genero']) && !empty($_POST['calificacion']) && !empty($_POST['aniopelicula']) && !empty($_POST['director'])
    ) {

        $nombre = $_POST['titulopelicula'];
        $descripcion = $_POST['descripcion'];
        $genero = $_POST['genero'];
        $calificacion = $_POST['calificacion'];
        $aniopelicula = $_POST['aniopelicula'];
        $director = $_POST['director'];

        $insertarDatos = "INSERT INTO movies (nombre, descripcion, genero, calificacion, año, director_id) VALUES ('$nombre', '$descripcion', '$genero', '$calificacion', '$aniopelicula', '$director')";

        if (mysqli_query($conexion, $insertarDatos)) {
            // Redirigir después de la inserción exitosa
            header("Location: recibedatospeliculas.php");
            exit();
        } else {
            echo "Error ingresando datos: " . mysqli_error($conexion);
        }
    } else {
        echo "Error: faltan datos del formulario o algunos campos están vacíos";
    }
}
// Verificar si se ha enviado el formulario de eliminación
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_movie'])) {
    $id = $_GET['id_movie'];

    // Preparar consulta SQL para eliminar película
    $sql_eliminar = "DELETE FROM movies WHERE id_movie = $id";

    // Ejecutar consulta SQL
    if (mysqli_query($conexion, $sql_eliminar)) {
        echo "<script>alert('Película eliminada correctamente.');</script>";
        // Redirigir de nuevo a la página principal después de la eliminación
        echo "<script>window.location.href = 'recibedatospeliculas.php';</script>";
        exit();
    } else {
        echo "Error al eliminar película: " . mysqli_error($conexion);
    }
}
// Mostrar todas las películas registradas
$consulta = mysqli_query($conexion, "SELECT * FROM movies");
if ($consulta) {
    $peliculas = mysqli_fetch_all($consulta, MYSQLI_ASSOC);
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
    exit();
}

// Obtener la última película registrada
$ultimaPelicula = end($peliculas);

mysqli_close($conexion);
ob_end_flush();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
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
        <h1>Películas registradas</h1>

        <article class="animate__zoomIn" id="form_reg">


              <table >
                <thead>

                  <tr>

                  
                    <th >#</th>
                    <th >Titulo</th>
                    <th >Genero</th>
                    <th >Año</th>
                  </tr>
                </thead>
                <tbody>

                <?php foreach ($peliculas as $lista): ?>
                  <tr>
                    <th><?php echo $lista['id_movie'] ?></th>
                    <td><?php echo $lista['nombre'] ?></td>
                    <td><?php echo $lista['genero'] ?></td>
                    <td><?php echo $lista['año'] ?></td>
                    <td><a href="recibedatospeliculas.php?id_movie=<?php echo $lista['id_movie']; ?>">Eliminar</a></td>



                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>

        </article>








        <a href="administrar.html"><button class="boton-sec">Volver</button></a>
    </main>
    <footer class="nav-princ">
        <ul>
            <a href=""><li>Términos y condiciones</li></a>
            <a href=""><li>Preguntas frecuentes</li></a>
            <a href=""><li>Ayuda</li></a>
            <a href="administrar.html"><li>Administrar películas</li></a>
        </ul>
    </footer>
</body>
</html>
