<?php
include("conexion.php");
session_start();
if (isset($_SESSION['id_usuario'])){
	header("Location: admin.php");
}
// Login
//if(!empty($_POST)){
if(isset($_POST['ingresar'])){
	$usuario = mysqli_real_escape_string($conexion,$_POST['user']);
	$password = mysqli_real_escape_string($conexion,$_POST['pass']);
	//enviar encriptar contraceña a base de datos
	$password_encriptada = sha1($password);
	$sql = "SELECT idusuarios FROM usuarios WHERE usuario = '$usuario' AND password = '$password_encriptada' "; 
	$resultado = $conexion->query($sql);
	$rows = $resultado->num_rows;
	if($rows > 0){
		$row = $resultado->fetch_assoc();
		$_SESSION['id_usuario'] = $row ["idusuarios"];
		header("Location: admin.php");
	}else{
		echo " <script> alert('Usuario o Password Incorrecto');
		windows.location = 'index.php';</script>";
	}
}
?>