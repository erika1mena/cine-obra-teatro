<?php
ini_set('display_errors', 'off');
include_once("resources/class.database.php");

class registro_obra{
	var $fecha;
  	var $id_obra;

function registro_obra(){
}

function insert(){
	$sql = "INSERT INTO pelcula.tbl_registro_obra( fecha, id_empleado) VALUES ( '$this->fecha', '$this->id_obra')";
	try {
		pg::query("begin");
		$row = pg::query($sql);
		pg::query("commit");
		echo "1";
	}
	catch (DependencyException $e) {
		echo "Error: " . $e;
		pg::query("rollback");
		echo "-1";
	}
}

function getLista(){

	$sql="SELECT * FROM pelcula.tbl_registro_obra";
	try {
		echo "<SELECT id='id_r'>";
		$result = pg::query($sql);
		while ($row= pg_fetch_array($result)){
			echo "<OPTION value='".$row['id_obra']."'> ".$row['nombre_obra'].",".$row['descripcion_obra']." </OPTION>";
		}
		echo "</SELECT>";
	}
	catch (DependencyException $e) {
		pg::query("rollback");
	}
}

function getAutocomplete(){
	$res="";
	$sql="SELECT * FROM pelicula.tbl_registro_obra";
	try {
		$result = pg::query($sql);
		while ($row= pg_fetch_array($result)){
			$res .= '"' . $row['id_obra'] . ', ' . $row['nombre_obra'] . ', ' . $row['descripcion_obra'] . '"';
			$res .= ',';
		}
		$res = substr ($res, 0, -2);
		$res = substr ($res, 1);
	}
	catch (DependencyException $e) {
	}
	return $res;
}
}
?>
