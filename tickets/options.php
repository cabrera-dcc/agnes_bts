<?php
/**
 * Set of functions for managing the options assigned to Agnes tasks, the bug tracking system
 *
 * Loads, edits, changes the state of progress and remove tasks.
 * options.php from https://github.com/cabrera-dcc/agnes_bts 
 *
 * @package agnes_bts.tickets
 * @author cabrera_dcc (http://cabrera-dcc/github.io)
 * @copyright Copyright (c) 2015, Daniel Cabrera Cebrero
 * @license GNU General Public License (GPLv3 - https://github.com/cabrera-dcc/agnes_bts/blob/master/LICENSE)
 * @version Beta-1 (rev. 20150402)
*/

if(isset($_GET['option']) && isset($_GET['ref']) && isset($_GET['filter'])){
	require_once("db_functions.php");
	$id = $_GET['ref'];
	$filter = $_GET['filter'];

	switch($_GET['option']){
		case "info":
			break;
		case "start":
			$query = "UPDATE tickets SET estado='Progreso' WHERE id_ticket=$id";
			update($query);
			break;
		case "finish":
			$query = "UPDATE tickets SET estado='Completado' WHERE id_ticket=$id";
			update($query);
			break;
		case "edit":
			break;
		case "delete":
			break;
	}
}

header ("Location: ../index.php?filter=$filter");