<?php
// Asegúrate de que la sesión esté iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    // Redirige al usuario a la página de inicio de sesión
    header("Location: admin.php");
    exit;
}

$usuario = $_SESSION['id_usuario'];
$nombre = '';
$correo = '';

// Realiza la consulta a la base de datos
$sql = "SELECT Nombre, Correo FROM usuarios WHERE idusuarios = '$usuario'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    // Obtén los datos del usuario
    $usuario = $resultado->fetch_assoc();
    $nombre = $usuario['Nombre'];
    $correo = $usuario['Correo'];
} else {
    echo "Usuario no encontrado";
}
?>


<ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
        <img src="images/office.jpg">
      </div>
      <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
      <a href="#name"><span class="white-text name"><?php echo $nombre; ?></span></a>
      <a href="#email"><span class="white-text email"><?php echo $correo; ?></span></a>
    </div></li>
    <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
    <li><a href="#!">Second Link</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Subheader</a></li>
    <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
</ul>


<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
  });
</script>