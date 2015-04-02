<?php
/**
 * Set of functions to insert a new task into Agnes project database, the bug tracking system
 *
 * new_ticket.php from https://github.com/cabrera-dcc/agnes_bts 
 *
 * @package agnes_bts.tickets
 * @author cabrera_dcc (http://cabrera-dcc/github.io)
 * @copyright Copyright (c) 2015, Daniel Cabrera Cebrero
 * @license GNU General Public License (GPLv3 - https://github.com/cabrera-dcc/agnes_bts/blob/master/LICENSE)
 * @version Beta-1 (rev. 20150402)
*/

if(isset($_POST['nombre']) && isset($_POST['prioridad']) && isset($_POST['asignatario']) && isset($_POST['responsable']) && isset($_POST['descripcion'])){
	if(checkData($_POST['nombre'],$_POST['prioridad'],$_POST['asignatario'],$_POST['responsable'],$_POST['descripcion'])){
		require("db_functions.php");
		insert_task($_POST['nombre'],$_POST['prioridad'],$_POST['asignatario'],$_POST['responsable'],$_POST['descripcion'],$_POST['observaciones']);
	}
}

header ("Location: ../index.php");


function checkName($nombre)
{
	if($nombre == ""){
		return false;
	}
	
	return true;
}

function checkPriority($prioridad)
{
	if($prioridad != "Baja" && $prioridad != "Normal" && $prioridad != "Alta"){
		return false;
	}

	return true;
}

function checkDesignate($asignatario)
{
	if($asignatario == ""){
		return false;
	}
	
	return true;
}

function checkSupervisor($responsable)
{
	if($responsable == ""){
		return false;
	}
	
	return true;
}

function checkDescription($descripcion)
{
	if($descripcion == ""){
		return false;
	}
	
	return true;
}

function checkData($nombre,$prioridad,$asignatario,$responsable,$descripcion)
{
	if(!(checkName($nombre) || checkPriority($prioridad) || checkDesignate($asignatario) || checkSupervisor($responsable) || checkDescription($descripcion))){
		return false;
	}

	return true;
}