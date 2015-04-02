<?php

echo "<a href='tickets/options.php?option=info&ref=" . $row['id_ticket'] . "&filter=" . $_GET['filter'] . "' title='Ver información'><span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span></a> | ";
echo "<a href='tickets/options.php?option=start&ref=" . $row['id_ticket'] . "&filter=" . $_GET['filter'] . "' title='Comenzar tarea'><span class='glyphicon glyphicon-play-circle' aria-hidden='true'></span></a> | ";
echo "<a href='tickets/options.php?option=finish&ref=" . $row['id_ticket'] . "&filter=" . $_GET['filter'] . "' title='Finalizar tarea'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span></a> | ";
echo "<a href='tickets/options.php?option=edit&ref=" . $row['id_ticket'] . "&filter=" . $_GET['filter'] . "' title='Editar'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a> | ";
echo "<a href='tickets/options.php?option=delete&ref=" . $row['id_ticket'] . "&filter=" . $_GET['filter'] . "' title='Eliminar'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a> |";