<?php
/**
 * Set of functions to print the info of an Agnes task, the bug tracking system
 *
 * Checks the appropiate field and print its content.
 * load_info.php from https://github.com/cabrera-dcc/agnes_bts 
 *
 * @author cabrera-dcc (http://cabrera-dcc/github.io)
 * @copyright Copyright (c) 2015, Daniel Cabrera Cebrero
 * @license GNU General Public License (GPLv3 - https://github.com/cabrera-dcc/agnes_bts/blob/master/LICENSE)
 * @version Beta-1 (rev. 20150404)
*/

function load_name()
{
	if(isset($_GET['name'])){
		echo $_GET['name'];
	}
}

function load_priority()
{
	if(isset($_GET['priority'])){
		echo $_GET['priority'];
	}
}

function load_designate()
{
	if(isset($_GET['designate'])){
		echo $_GET['designate'];
	}
}

function load_supervisor()
{
	if(isset($_GET['supervisor'])){
		echo $_GET['supervisor'];
	}
}

function load_description()
{
	if(isset($_GET['description'])){
		echo $_GET['description'];
	}
}

function load_observations()
{
	if(isset($_GET['observations'])){
		echo $_GET['observations'];
	}
}

function load_ref()
{
	if(isset($_GET['ref'])){
		echo $_GET['ref'];
	}
}