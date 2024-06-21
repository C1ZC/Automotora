<?php
	include "conexion.php";

	extract($_GET);

	if(@$idborrar==2845){
	
	 
	
		$sqlborrar="DELETE FROM autos WHERE idautos=$idautos";
	
		$resborrar=mysqli_query($conexion,$sqlborrar);
	}
?>

<script type="text/javascript">
	alert("Auto Eliminado exitosamente");
	window.location.href='index.php';
</script>
