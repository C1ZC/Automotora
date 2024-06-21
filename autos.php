<?php
include("conexion.php");
//registrar usuario este metodo evita inyecciones en tus campos de datos.
if(isset($_POST["registrar"])){
	$idautos = mysqli_real_escape_string($conexion,$_POST['idautos']);
	$matricula = mysqli_real_escape_string($conexion,$_POST['matricula']);
	$serial_motor = mysqli_real_escape_string($conexion,$_POST['serial_motor']);
	$serial_carroceria = mysqli_real_escape_string($conexion,$_POST['serial_carroceria']);
    $marca = mysqli_real_escape_string($conexion,$_POST['marca']);
    $modelo = mysqli_real_escape_string($conexion,$_POST['modelo']);
    $anio = mysqli_real_escape_string($conexion,$_POST['anio']);
    $color = mysqli_real_escape_string($conexion,$_POST['color']);
    $precio = mysqli_real_escape_string($conexion,$_POST['precio']);
	
	//esto permite que no se agregue 2 autos con la misma ID 
	$sqluser = "SELECT idautos FROM autos WHERE idautos = '$idautos'; ";
	$resultadouser = $conexion->query($sqluser);
	$filas= $resultadouser->num_rows;
	if($filas > 0){
		echo " <script> alert('EL usuario ya existe');
		windows.location = 'autos.php';</script>";
	}else{
		//insertar informacion del usuario + "password encriptada"
		$sqlusuario = "INSERT INTO autos(idautos,Matricula,Serial_motor,Serial_carroceria,Marca,Modelo,Anio,Color,Precio) VALUES ('$idautos', '$matricula', '$serial_motor', '$serial_carroceria', '$marca', '$modelo', '$anio', '$color', '$precio')";
		
		$resultadousuario = $conexion->query($sqlusuario);
		if($resultadousuario > 0) {
			echo " <script> alert('Registro Exitoso');
		windows.location = 'autos.php';</script>";
		}else{
			echo " <script> alert('Error al Registrarse');
		windows.location = 'autos.php';</script>";
		}
	}
}

// Inicializar $siguienteId
$siguienteId = 1;

// Obtener el ID más grande actualmente en la base de datos
$sqlMaxId = "SELECT MAX(idautos) as maxId FROM autos";
$resultadoMaxId = $conexion->query($sqlMaxId);
if ($resultadoMaxId) {
    $rowMaxId = $resultadoMaxId->fetch_assoc();

    // Calcular el siguiente ID
    if ($rowMaxId['maxId']) {
        $siguienteId = $rowMaxId['maxId'] + 1;
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<title>Bienvenido a la Automotora</title>
	<!--CSS MATERIALIZE-->
	<link href="css/estilos.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
include("navegacion.php");
?>
<!--register -->
<header>
      <h1>Registrar Automotora</h1>
    </header>
    <div class="container pt-60">
      <div class="row">
			<h4>Ingresa tu Información del automovil</h4>
        <form class="col s12" action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
          <div class="row">
            <div class="input-field col s6">
            <input id="idautos" type="text" class="validate" name ="idautos" required="true" value="<?php echo $siguienteId; ?>" readonly>
              <label for="idautos">ID Autos</label>
            </div>
            <div class="input-field col s6">
              <input id="matricula" type="text" class="validate" name = "matricula" required="true">
              <label for="matricula">Matricula</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input id="serial_motor" type="text" class="validate" name = "serial_motor" required="true">
              <label for="serial_motor">Serial Motor</label>
            </div>
            <div class="input-field col s6">
              <input id="serial_carroceria" type="text" class="validate" name="serial_carroceria" required="true">
              <label for="serial_carroceria">Serial Carroceria</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input id="marca" type="text" class="validate" name="marca" required="true">
              <label for="marca">Marca</label>
            </div>
            <div class="input-field col s6">
              <input id="modelo" type="text" class="validate" name="modelo" required="true">
              <label for="modelo">Modelo</label>
            </div>
          </div>
		  <div class="row">
            <div class="input-field col s6">
              <input id="anio" type="text" class="validate" name="anio" required="true">
              <label for="anio">Año del Vehiculo</label>
            </div>
            <div class="input-field col s6">
              <input id="color" type="text" class="validate" name="color" required="true">
              <label for="color">Color del Vehiculo</label>
            </div>
          </div>
          <div class="row">
          <div class="input-field col s12">
              <input id="precio" type="tel" class="validate" name="precio" required="true">
              <label for="precio">Precio</label>
            </div>
          </div>
          
          <div class="row">
            <div class="col s12 mt-25"> 
              <button class="btn waves-effect waves-light pulse" type="submit" name="registrar">Registrar
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    

    <div class="col s12 mt-25"> </div>

<!--register-->
  <div>
  	<?php require_once("piedepagina.php"); ?>
   </div>

</body>
</html>