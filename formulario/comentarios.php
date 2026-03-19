<?php include('header.php'); ?>
<?php include('conecta.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comentarios</title>

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/comentarios.css">
</head>

<body class="p-4">

<h1 class="mb-4">Comentarios de Usuarios</h1>

<table class="table table-bordered">
    <tr class="table-dark">
        <th>ID</th>
        <th>Nombre</th>
        <th>Comentario</th>
        <th>Puntuación</th>
    </tr>

<?php
$sql = "SELECT * FROM usuarios_comentarios ORDER BY id DESC";
$query = $conexion->query($sql);
$cont = 1;

while ($dato = $query->fetch_assoc()) {
    $id = $dato['id'];
    $nombre = $dato['nombre'];
    $comentario = $dato['comentario'];
    $puntuacion = $dato['puntuacion'];

    echo "<tr>
            <td>$id</td>
            <td>$nombre</td>
            <td>$comentario</td>
            <td>$puntuacion</td>
          </tr>";
    $cont++;
}
?>
</table>

<hr>

<form id="form1" method="post" action="procesa_datos.php">

<table class="table">
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Comentario</th>
    <th>Puntuación (0-10)</th>
</tr>

<tr>
    <td>
        <input type="text" name="id_comentario" value="AUTO" readonly class="form-control">
    </td>

    <td>
        <input type="text" id="nombre_usuario" name="nombre_usuario"
               class="form-control"
               placeholder="Ingresar Nombre"
               data-bs-toggle="tooltip"
               title="Nombre del usuario que comenta">
    </td>

    <td>
        <input type="text" id="comentario_usuario" name="comentario_usuario"
               class="form-control"
               placeholder="Ingresar Comentario"
               data-bs-toggle="tooltip"
               title="Escribe el comentario del usuario">
    </td>

    <td>
        <input type="number" id="puntuacion_usuario" name="puntuacion_usuario"
               class="form-control"
               min="0" max="10"
               placeholder="0 a 10"
               data-bs-toggle="tooltip"
               title="Puntuación del 0 al 10">
    </td>
</tr>

<tr>
    <td colspan="4">
        <input id="btn-guardar" name="btn_guardar"
               type="submit"
               value="Guardar Comentario"
               class="btn btn-primary w-100">
    </td>
</tr>
</table>
</form>

<!-- validacion modal -->
<div class="modal fade" id="myModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title">Falta Información</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <p id="TxtRequerido"></p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Cerrar
        </button>
      </div>

    </div>
  </div>
</div>

<?php include('footer.php'); ?>

<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<!-- validacion + el moda -->
<script>
document.getElementById("form1").addEventListener("submit", function(e){

    let nombre = document.getElementById("nombre_usuario").value.trim();
    let comentario = document.getElementById("comentario_usuario").value.trim();
    let puntuacion = document.getElementById("puntuacion_usuario").value.trim();

    let mensaje = "";

    if(nombre === "")
        mensaje = "Debe ingresar el nombre del usuario";
    else if(comentario === "")
        mensaje = "Debe ingresar el comentario";
    else if(puntuacion === "")
        mensaje = "Debe ingresar la puntuación";
    else if(puntuacion < 0 || puntuacion > 10)
        mensaje = "La puntuación debe estar entre 0 y 10";

    if(mensaje !== ""){
        e.preventDefault();
        document.getElementById("TxtRequerido").innerText = mensaje;
        const modal = new bootstrap.Modal(document.getElementById('myModal'));
        modal.show();
    }

});
</script>

</body>
</html>

