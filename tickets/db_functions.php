<?php
/**
 * Set of functions for Agnes project database, the bug tracking system
 *
 * Functions to connect to MYSQL database using PHP Data Objects (PDO) and interact with it.
 * db_functions.php from https://github.com/cabrera-dcc/agnes_bts 
 *
 * @author cabrera-dcc (http://cabrera-dcc/github.io)
 * @copyright Copyright (c) 2015, Daniel Cabrera Cebrero
 * @license GNU General Public License (GPLv3 - https://github.com/cabrera-dcc/agnes_bts/blob/master/LICENSE)
 * @version Beta-1 (rev. 20150407)
*/

function connectDB()
{
	require_once("db_config.php");

	try{
		$db = new PDO("mysql:host=$db_host;dbname=$db_name;charset=$db_charset", $db_user, $db_passwd);
		$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,true);
		$db->setAttribute(PDO::ATTR_ERRMODE,true);
		$db->setAttribute(PDO::ERRMODE_EXCEPTION,true);
		return $db;
	} catch (PDOException $ex){
		echo "<p>Error to connect: PDOException</p>";
	}
}


function insert_ticket($nombre,$prioridad,$asignatario,$responsable,$descripcion,$observaciones)
{
	$fecha = new DateTime();
	$fecha = $fecha->format('Y/m/d H:i:s');

	$query = "INSERT INTO tickets (nombre, estado, prioridad, fecha_asignacion, asignatario, responsable, descripcion, observaciones)
		VALUES ('".$nombre."','Pendiente','".$prioridad."','".$fecha."','".$asignatario."','".$responsable."','".$descripcion."','".$observaciones."')";

	$db = connectDB();

	if($db->query($query)){
		echo "<p>Success</p>";
	}
	else{
		echo "<p>Error to insert</p>";
	}
}

function update_ticket($nombre,$prioridad,$asignatario,$responsable,$descripcion,$observaciones,$reference)
{
	$query = "UPDATE tickets SET nombre='$nombre', prioridad='$prioridad', asignatario='$asignatario', responsable='$responsable', descripcion='$descripcion', observaciones='$observaciones' WHERE id_ticket=$reference";

	$db = connectDB();
	$db->query($query);
}

function select($query)
{
	$db = connectDB();
	$rows = $db->query($query);

	if($rows){
		return $rows;
	}
	
	return false;
}

function update($query)
{
	$db = connectDB();
	$db->query($query);
}

function filter($option)
{
	$query = "SELECT id_ticket,nombre,estado,prioridad,fecha_asignacion,fecha_finalizacion,asignatario FROM tickets";

	switch($option){
		case "all":
			$query .= " WHERE estado!='DELETED'";
			break;
		case "pending":
			$query .= " WHERE estado='Pendiente'";
			break;
		case "progress":
			$query .= " WHERE estado='Progreso'";
			break;
		case "completed":
			$query .= " WHERE estado='Completado'";
			break;
		case "high":
			$query .= " WHERE prioridad='Alta' AND estado!='DELETED'";
			break;
		case "normal":
			$query .= " WHERE prioridad='Normal' AND estado!='DELETED'";
			break;
		case "low":
			$query .= " WHERE prioridad='Baja' AND estado!='DELETED'";
			break;
	}

	show(select($query));
}

function show($rows)
{
	foreach ($rows as $row){
		echo "<tr id='ref-" . $row['id_ticket'] . "'>";
			echo "<td class='ref'>" . $row['id_ticket'] . "</td>";
			echo "<td>" . $row['nombre'] . "</td>";
			echo "<td>" . $row['estado'] . "</td>";
			echo "<td>" . $row['prioridad'] . "</td>";
			echo "<td>" . $row['fecha_asignacion'] . "</td>";
			echo "<td>" . $row['fecha_finalizacion'] . "</td>";
			echo "<td>" . $row['asignatario'] . "</td>";
			echo "<td>";
			require("include/option_icons.php");
		echo "</tr>";
	}
}