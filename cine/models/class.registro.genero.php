<?php
ini_set('display_errors', 'off');
include_once("resources/class.database.php");

class registro_genero{
	var $fecha;
  	var $id_genero;

function registro_genero(){
}

function insert(){
	$sql = "INSERT INTO pelicula.tbl_registro_genero( fecha, id_genero) VALUES ( '$this->fecha', '$this->id_genero')";
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

	$sql="SELECT * FROM pelicula.tbl_registro_genero";
	try {
		echo "<SELECT id='id_r'>";
		$result = pg::query($sql);
		while ($row= pg_fetch_array($result)){
			echo "<OPTION value='".$row['id_genero']."'> ".$row['descripcion_genero']." </OPTION>";
		}
		echo "</SELECT>";
	}
	catch (DependencyException $e) {
		pg::query("rollback");
	}
}

function getAutocomplete(){
	$res="";
	$sql="SELECT * FROM pelicula.tbl_registro_genero";
	try {
		$result = pg::query($sql);
		while ($row= pg_fetch_array($result)){
			$res .= '"' . $row['id_genero'] . ', ' . $row['descripcion_genero'] . '"';
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
