<?php
include("conexion.php");

//ordenar lista tabla
 //obtenemos valores que envió la funcion en
 //Javascript mediante el metodo GET
 if(isset($_GET['campo']) and isset($_GET['orden'])){
  $campo=$_GET['campo'];
  $orden=$_GET['orden'];
 }else{
  //por defecto
  $campo='marca';
  $orden='ASC';
 }
 //realizamos la consulta de los empleados,
 //ordenandolos segun campo y asc o desc
 //ej. SELECT * FROM empleado ORDER BY nombres ASC
//$sql1="SELECT * FROM profesores ORDER BY $campo $orden";
//$Consulta=$conexion->query($sql1);

//buscar en tabla
$where = "";

if (!empty($_POST)) 
{
  $valor = $_POST['campo1'];
  if (!empty($valor)) {
    //buscar varias tablas
    $where = "WHERE idautos LIKE '%$valor' OR Matricula LIKE '%$valor' OR Serial_motor LIKE '%$valor' OR Serial_carroceria LIKE '%$valor' OR Marca LIKE '%$valor' OR Modelo LIKE '%$valor' OR Anio LIKE '%$valor' OR Color LIKE '%$valor' OR Precio LIKE '%$valor'";
  }
}
//$sql = "SELECT * FROM profesores $where";
//$resultado = $conexion->query($sql);

//combinacion de busqueda con orden asendente
$sql2 = "SELECT * FROM autos $where ORDER BY $campo $orden";
$res =$conexion->query($sql2);

?>
<div class="dataTables_scrollBody" style="position: relative; overflow: auto; max-height: 400px; width: 100%;">
<table cellspacing="0" cellpading="0">
      <thead>
        <tr class="encabezado">
        <?php
        //definimos dos arrays uno para los nombre de los campos de la tabla y
        //para los nombres que mostraremos en vez de los de la tabla -encabezados
        $campos = "idautos, Matricula, Serial_motor, Serial_carroceria, Marca, Modelo, Anio, Color, Precio";
        $cabecera = "ID Autos, Matricula, Serial Motor, Serial Carroceria, Marca, Modelo, Año, Color, Precio";
        //los separamos mediante coma
        $cabecera = explode(",", $cabecera);
        $campos = explode(",", $campos);
        //numero de elementos en el primer array
        $nroItemsArray = count($campos);
        //iniciamos variable i=0
        $i = 0;
        //mediante un bucle crearemos las columnas
        while ($i <= $nroItemsArray - 1) {
          //comparamos: si la columna campo es igual al elemento
          //actual del array
          if ($campos[$i] == $campo) {
            //comparamos: si esta Descendente cambiamos a Ascendente
            //y viceversa
            if ($orden == "DESC") {
              $orden = "ASC";
            } else {
              $orden = "DESC";
            }
            //si coinciden campo con el elemento del array
            //la cabecera tendrá un color distinto
            echo "	<td class=\"encabezado_selec\"><a onclick=\"OrdenarPor('".$campos[$i]."','".$orden."')\">".$cabecera[$i]."</a></td> \n";
          } else {
            //caso contrario la columna no tendra color
            echo "	<td><a onclick=\"OrdenarPor('" . $campos[$i] . "','DESC')\">" . $cabecera[$i] . "</a></td> \n";
          }
          $i++;
        }
        ?>
          <th> <a href="autos.php"> <button type="button" class="btn btn-info">Agregar</button> </a> </th>
        </tr>
      </thead>

      <tbody>
        <?php
        //esta funcion permite comparar el campo actual y el nombre de
      //la columna en la base de datos
      function estiloCampo($_campo, $_columna)
      {
        if ($_campo == $_columna) {
          return " class=\"filas_selec\"";
        } else {
          return "";
        }
      }
      //mostramos los resultados mediante la consulta de arriba 

         
        
          //while ($filas = $resultado->fetch_assoc()) {
            while ($filas = mysqli_fetch_array($res)){
              
        
          echo "<tr>";
          echo "<td" . estiloCampo($campo, 'idautos') . ">";
          echo $filas['idautos'];
          echo "</td>";
          echo "<td " . estiloCampo($campo, 'Matricula') . ">";
          echo $filas['Matricula'];
          echo "</td>";
          echo "<td " . estiloCampo($campo, 'Serial Motor') . ">";
          echo $filas['Serial_motor'];
          echo "</td>";
          echo "<td " . estiloCampo($campo, 'Serial Carroceria') . ">";
          echo $filas['Serial_carroceria'];
          echo "</td>";
          echo "<td " . estiloCampo($campo, 'Marca') . ">";
          echo $filas['Marca'];
          echo "</td>";
          echo "<td " . estiloCampo($campo, 'Modelo') . ">";
          echo $filas['Modelo'];
          echo "</td>";
          echo "<td " . estiloCampo($campo, 'Año') . ">";
          echo $filas['Anio'];
          echo "</td>";
          echo "<td " . estiloCampo($campo, 'Color') . ">";
          echo $filas['Color'];
          echo "</td>";
          echo "<td " . estiloCampo($campo, 'Precio') . ">";
          echo $filas['Precio'];
          echo "</td>";
          echo "<td> <a href='modificar.php?idautos=" . $filas['idautos'] . "'><button type='button' class='btn btn-danger'>Modificar</button></a> </td>";
          //echo "<td>  <a href='modificar.php?idempleados=" . $filas['idempleados'] . "&apellido=" . $filas['Apellido'] . "&nombre=" . $filas['Nombre'] . "&seccional=" . $filas['Seccional'] . "&facultad=" . $filas['Facultad'] . "&cargo=" . $filas['Cargo'] . "&salarioo=" . $filas['Salario'] . "&fech_com=" . $filas['Fech_com'] . "&fech_nac=" . $filas['Fech_nac'] . "'> <button type='button' formaction='modif_prod1.php' class='btn btn-success'>Modificar</button> </a> </td>";
          echo "<td> <a href='eliminar.php?idautos=" . $filas['idautos'] . "&idborrar=2845''><button type='button' class='btn btn-danger'>Eliminar</button></a> </td>";
          echo "</tr>";
        }
      
        //}
    
        ?>
      <tbody>
        <!-- AFUERA para que se haga DIVICION-->
    </table>
      </div>