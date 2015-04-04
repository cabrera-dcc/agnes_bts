<?php
/**
 * Set of functions for managing the options assigned to Agnes tasks, the bug tracking system
 *
 * Loads, edits, changes the state of progress and remove tasks.
 * options.php from https://github.com/cabrera-dcc/agnes_bts 
 *
 * @author cabrera-dcc (http://cabrera-dcc/github.io)
 * @copyright Copyright (c) 2015, Daniel Cabrera Cebrero
 * @license GNU General Public License (GPLv3 - https://github.com/cabrera-dcc/agnes_bts/blob/master/LICENSE)
 * @version Beta-1 (rev. 20150404)
*/

if(isset($_GET['option']) && isset($_GET['ref']) && isset($_GET['filter'])){
	require_once("db_functions.php");
	$option = $_GET['option'];
	$id = $_GET['ref'];
	$filter = $_GET['filter'];

	switch($option){
		case "info":
			$query = "SELECT id_ticket,nombre,prioridad,asignatario,responsable,descripcion,observaciones FROM tickets WHERE id_ticket=$id";
			$rows = select($query);
			foreach ($rows as $row) {
				$name = $row['nombre'];
				$priority = $row['prioridad'];
				$designate = $row['asignatario'];
				$supervisor = $row['responsable'];
				$description = $row['descripcion'];
				$observations = $row['observaciones'];
			}
			header ("Location: ../index.php?filter=$filter&option=$option&name=$name&priority=$priority&designate=$designate&supervisor=$supervisor&description=$description&observations=$observations&ref=$id");
			break;
		case "start":
			$query = "UPDATE tickets SET estado='Progreso' WHERE id_ticket=$id";
			update($query);
			header ("Location: ../index.php?filter=$filter");
			break;
		case "finish":
			$query = "UPDATE tickets SET estado='Completado' WHERE id_ticket=$id";
			update($query);
			header ("Location: ../index.php?filter=$filter");
			break;
		case "edit":
			break;
		case "delete":
			break;
		default:
			header ("Location: ../index.php");
	}
}