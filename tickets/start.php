<?php
/**
 * Set of initial checks for Agnes, the bug tracking system
 *
 * start.php from https://github.com/cabrera-dcc/agnes_bts 
 *
 * @author cabrera-dcc (http://cabrera-dcc/github.io)
 * @copyright Copyright (c) 2015, Daniel Cabrera Cebrero
 * @license GNU General Public License (GPLv3 - https://github.com/cabrera-dcc/agnes_bts/blob/master/LICENSE)
 * @version Beta-1 (rev. 20150406)
*/

if(isset($_GET['option']) && ($_GET['option'] == "info" || $_GET['option'] == "edit")){
		$ref = $_GET['ref'];
		$load = true;
		include("tickets/load_info.php");
		if($_GET['option'] == "edit"){
			$action = "tickets/save_ticket.php?ref=$ref";
		}
		else{
			$action = "tickets/save_ticket.php";
		}
	}
	else{
		$action = "tickets/save_ticket.php";
		$load = false;
	}

	function check_filter()
	{
		if(isset($_GET['filter'])){
			require_once("tickets/db_functions.php");
			filter($_GET['filter']);
	  	}
	}