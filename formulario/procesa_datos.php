<?php

include('conecta.php');

echo '<pre>';
print_r($_POST);
echo '</pre>';

// Captura de datos del formulario
$idComentario      = $_POST['id_comentario']; 
$nombreUsuario     = $_POST['nombre_usuario'];
$comentarioUsuario = $_POST['comentario_usuario'];
$puntuacionUsuario = $_POST['puntuacion_usuario'];

// Insertamos en la base de datos
$sql = "INSERT INTO usuarios_comentarios (nombre, comentario, puntuacion) 
        VALUES ('$nombreUsuario', '$comentarioUsuario', '$puntuacionUsuario')";

$conexion->query($sql);

// Redirigir después de guardar
header("Location: comentarios.php");
exit();
?>
