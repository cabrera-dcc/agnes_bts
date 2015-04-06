<?php
/**
 * Set of functions to insert and update a ticket into Agnes project database, the bug tracking system
 *
 * save_ticket.php from https://github.com/cabrera-dcc/agnes_bts 
 *
 * @author cabrera-dcc (http://cabrera-dcc/github.io)
 * @copyright Copyright (c) 2015, Daniel Cabrera Cebrero
 * @license GNU General Public License (GPLv3 - https://github.com/cabrera-dcc/agnes_bts/blob/master/LICENSE)
 * @version Beta-1 (rev. 20150406)
*/

if(isset($_POST['nombre']) && isset($_POST['prioridad']) && isset($_POST['asignatario']) && isset($_POST['responsable']) && isset($_POST['descripcion'])){
	if(checkData($_POST['nombre'],$_POST['prioridad'],$_POST['asignatario'],$_POST['responsable'],$_POST['descripcion'],$_POST['observaciones'])){
		require_once("db_functions.php");
		if(isset($_POST['btn-save']) && isset($_GET['ref'])){
			$ref = $_GET['ref'];
			update_ticket($_POST['nombre'],$_POST['prioridad'],$_POST['asignatario'],$_POST['responsable'],$_POST['descripcion'],$_POST['observaciones'],$ref);
		}
		if(isset($_POST['btn-create'])){
			insert_ticket($_POST['nombre'],$_POST['prioridad'],$_POST['asignatario'],$_POST['responsable'],$_POST['descripcion'],$_POST['observaciones']);
		}
	}
}

header ("Location: ../index.php");


function checkData($nombre,$prioridad,$asignatario,$responsable,$descripcion,$observaciones)
{
	if(checkName($nombre) && checkPriority($prioridad) && checkDesignate($asignatario) && checkSupervisor($responsable) && checkDescription($descripcion) && checkObservations($observaciones)){
		return true;
	}

	return false;
}

function checkName($nombre)
{
	if(strlen($nombre)<4 || strlen($nombre)>99){
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
	if(strlen($asignatario)<4 || strlen($asignatario)>99){
		return false;
	}
	
	return true;
}

function checkSupervisor($responsable)
{
	if(strlen($responsable)<4 || strlen($responsable)>99){
		return false;
	}
	
	return true;
}

function checkDescription($descripcion)
{
	if(strlen($descripcion)<4 || strlen($descripcion)>254){
		return false;
	}
	
	return true;
}

function checkObservations($observaciones)
{
	if(strlen($observaciones)>254){
		return false;
	}
	
	return true;
}