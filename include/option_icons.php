<?php
/**
 * Include file for Agnes, the bug tracking system
 *
 * Includes links to be displayed as options.
 * option_icons.php from https://github.com/cabrera-dcc/agnes_bts
 *
 * @author cabrera-dcc (http://cabrera-dcc/github.io)
 * @copyright Copyright (c) 2015, Daniel Cabrera Cebrero
 * @license GNU General Public License (GPLv3 - https://github.com/cabrera-dcc/agnes_bts/blob/master/LICENSE)
 * @version Beta-1 (rev. 20150403)
*/

echo "<a class='info' href='tickets/options.php?option=info&ref=" . $row['id_ticket'] . "&filter=" . $_GET['filter'] . "' title='Ver información'><span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span></a> | ";
echo "<a class='start' href='tickets/options.php?option=start&ref=" . $row['id_ticket'] . "&filter=" . $_GET['filter'] . "' title='Comenzar tarea'><span class='glyphicon glyphicon-play-circle' aria-hidden='true'></span></a> | ";
echo "<a class='finish' href='tickets/options.php?option=finish&ref=" . $row['id_ticket'] . "&filter=" . $_GET['filter'] . "' title='Finalizar tarea'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span></a> | ";
echo "<a class='edit' href='tickets/options.php?option=edit&ref=" . $row['id_ticket'] . "&filter=" . $_GET['filter'] . "' title='Editar'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a> | ";
echo "<a class='delete' href='tickets/options.php?option=delete&ref=" . $row['id_ticket'] . "&filter=" . $_GET['filter'] . "' title='Eliminar'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a> |";