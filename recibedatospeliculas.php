<?php

if ($_POST) {


// var_dump($_POST);
$nombre = $_POST['titulopelicula'];
$descripcion = $_POST['descripcion'];
$genero = $_POST['genero'];
$calificacion = $_POST['calificacion'];
$aniopelicula = $_POST['aniopelicula'];
$director = $_POST['director'];


$peliculas = [

  "titulo"=>$nombre,
  "descripcion"=>$descripcion,
  "genero"=>$genero,
  "cantidadEstrellas"=>$calificacion,
  "anio"=>$aniopelicula,
  "director"=>$director
];
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
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
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
        
          


      <h1>Pelicula registrada correctamente</h1>

          <article class="animate__zoomIn" id="form_reg">

            <h2>Título "<?php echo $peliculas["titulo"]?>"</h2>
            <h3>Descripción "<?php echo $peliculas["descripcion"]?>"</h3>
            <h3>Genero "<?php echo $peliculas["genero"]?>"</h3>
            <h3>Calificacion "<?php echo $peliculas["cantidadEstrellas"]?>"</h3>
            <h3>Año "<?php echo $peliculas["anio"]?>"</h3>
            <h3>Director "<?php echo $peliculas["director"]?>"</h3>
            <a href="administrar.html"><button class="boton-sec">Volver</button></a>

          </article>


    </main>
    <footer class="nav-princ">
        <ul>
            <a href=""><li>Términos y condiciones</li></a>
            <a href=""><li>Preguntas frecuentes</li></a>
            <a href=""><li>Ayuda</li></a>
            <a href="administrar.html"><li>Administrar peliculas</li></a>
        </ul>
    </footer>


</body>
</html>
  <?php



}
else {
  echo "no hay datos";
}




  ?>