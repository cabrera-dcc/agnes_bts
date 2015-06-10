<?php
/**
 * Set of functions to print the info of an Agnes task, the bug tracking system
 *
 * Checks the appropiate field and print its content.
 * load_info.php from https://github.com/cabrera-dcc/agnes_bts 
 *
 * @author cabrera-dcc (http://cabrera-dcc.github.io)
 * @license GNU General Public License (GPLv3 - https://github.com/cabrera-dcc/agnes_bts/blob/master/LICENSE)
 * @version Beta-1 (rev. 20150406)
*/

function load_data($type)
{
	switch($type){
		case "name":
			if(isset($_GET['name'])){
				echo $_GET['name'];
			}
			break;
		case "priority":
			if(isset($_GET['priority'])){
				echo $_GET['priority'];
			}
			break;
		case "designate":
			if(isset($_GET['designate'])){
				echo $_GET['designate'];
			}
			break;
		case "supervisor":
			if(isset($_GET['supervisor'])){
				echo $_GET['supervisor'];
			}
			break;
		case "description":
			if(isset($_GET['description'])){
				echo $_GET['description'];
			}
			break;
		case "observations":
			if(isset($_GET['observations'])){
				echo $_GET['observations'];
			}
			break;
		case "ref":
			if(isset($_GET['ref'])){
				echo $_GET['ref'];
			}
			break;
	}
}