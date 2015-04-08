<?php
	require_once("tickets/start.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8"/>
	<meta name="application-name" content="Agnes"/>
	<meta name="description" content="Sistema de Seguimiento de Errores"/>
	<meta name="author" content="Daniel Cabrera Cebrero (http://cabrera-dcc.github.io)"/>
	<meta name="version" content="Beta-1 (rev. 20150407)"/>
	<meta name="keywords" content="bts, bug, incident, traking, ticket"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title>Agnes | BTS</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/agnes-default.css"/>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-static-top small text-uppercase">
		<div class="container-fluid">
			<a class="navbar-brand" target="_blank" rel="alternate" hreflang="en" type="text/html" href="https://github.com/cabrera-dcc/agnes_bts"><strong>Agnes</strong></a>
			<p id="nav-description" class="navbar-text navbar-right"><small>Un sencillo</small> Sistema de Seguimiento de Incidencias</p>
		</div>
	</nav>

	<main class="container-fluid">
		<section id="form-section" class="col-md-4 col-lg-3">
			<form class="small" action="<?php echo $action ?>" method="post">
	  				<div class="form-group col-sm-12">
				    	<label for="inputTitle" class="control-label text-uppercase">Título</label>
				    	<div class="input-group">
				    		<span class="input-group-addon"><span class="glyphicon glyphicon-pushpin"></span></span>
				      		<input name="nombre" type="text" class="form-control input-sm" id="inputTitle" maxlength="100" disabled="disabled" placeholder="Nombre del ticket (4-100 caracteres)" value="<?php if($load==true){load_data("name");}?>" required/>
				      	</div>
				  	</div>
				
				  	<div class="form-group col-sm-6">
				    	<label for="inputPriority" class="control-label text-uppercase">Prioridad</label>
				    	<div class="input-group">
				    		<span class="input-group-addon"><span class="glyphicon glyphicon-exclamation-sign"></span></span>
				      		<select class="form-control input-sm" name="prioridad" id="inputPriority" disabled="disabled" value="<?php if($load==true){load_data("priority");}?>">
								<option value="Normal">Normal</option>
								<option value="Baja">Baja</option>
								<option value="Alta">Alta</option>
							</select>
				      	</div>
				  	</div>
			  	
				  	<div class="form-group col-sm-6">
				    	<label for="inputRef" class="control-label text-uppercase">Referencia</label>
				    	<div class="input-group">
				    		<span class="input-group-addon"><span class="glyphicon glyphicon-certificate"></span></span>
				      		<input name="reference" type="text" class="form-control input-sm" id="inputRef" placeholder="#" disabled="disabled" value="<?php if($load==true){load_data("ref");}?>" required/>
						</div>
				  	</div>
				
	  				<div class="form-group col-sm-6 col-md-12">
				    	<label for="inputTarget" class="control-label text-uppercase">Asignatario</label>
				    	<div class="input-group">
				    		<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
				      		<input name="asignatario" type="text" class="form-control input-sm" id="inputDesignate" maxlength="100" disabled="disabled" placeholder="Asignado a... (4-100 caracteres)" value="<?php if($load==true){load_data("designate");}?>" required/>
						</div>
				  	</div>
			  	
				  	<div class="form-group col-sm-6 col-md-12">
				    	<label for="inputBoss" class="control-label text-uppercase">Responsable</label>
				    	<div class="input-group">
				    		<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
				      		<input name="responsable" type="text" class="form-control input-sm" id="inputSupervisor" maxlength="100" disabled="disabled" placeholder="Asignado por... (4-100 caracteres)" value="<?php if($load==true){load_data("supervisor");}?>" required/>
				      	</div>
				  	</div>
			  	
					<div class="form-group col-sm-6 col-md-12">
						<label for="areaDescription" class="control-label text-uppercase">Descripción</label>
						<textarea name="descripcion" class="form-control input-sm" rows="3" id="areaDescription" maxlength="255" disabled="disabled" placeholder="Descripción del ticket (4-255 caracteres)" required><?php if($load==true){load_data("description");}?></textarea>
					</div>

					<div class="form-group col-sm-6 col-md-12">
						<label for="areaObservations" class="control-label text-uppercase">Observaciones</label>
						<textarea name="observaciones" class="form-control input-sm" rows="3" id="areaObservations" maxlength="255" disabled="disabled" placeholder="Observaciones (hasta 255 caracteres)"><?php if($load==true){load_data("observations");}?></textarea>
					</div>
				
					<div class="form-group container-fluid">
						<div class="btn-group btn-group-justified" role="group">
							<div class="btn-group btn-group-xs" role="group">
		  						<button id="new" type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> <small>Nuevo</small></button>
							</div>
							<div class="btn-group btn-group-xs" role="group">
		  						<button name="btn-create" id="create" type="submit" class="btn btn-default" disabled="disabled"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> <small>Crear</small></button>
							</div>
							<div class="btn-group btn-group-xs" role="group">
		  						<button id="cancel" type="button" class="btn btn-default" disabled="disabled"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> <small>Cancelar</small></button>
		  					</div>
		  					<div class="btn-group btn-group-xs" role="group">
		  						<button name="btn-save" id="save" type="submit" class="btn btn-default" disabled="disabled"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> <small>Guardar</small></button>
		  					</div>
						</div>
					</div>
			</form>
		</section>

		<section class="col-md-8 col-lg-9">
			<div id="filters" class="btn-group btn-group-xs" role="group">
  				<a role="button" class="btn btn-default" href="index.php?filter=all"><span class="glyphicon glyphicon-list-alt"></span> <small>Ver todo</small></a>

  				<div class="btn-group btn-group-xs" role="group">
    				<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
      					<span class="glyphicon glyphicon-filter"></span> <small>Por estado</small>
      					<span class="caret"></span>
    				</button>
    				<ul class="dropdown-menu" role="menu">
      					<li class="small"><a href="index.php?filter=pending"><span class="glyphicon glyphicon-inbox"></span> Pendiente</a></li>
      					<li class="small"><a href="index.php?filter=progress"><span class="glyphicon glyphicon-play-circle"></span> Progreso</a></li>
      					<li class="small"><a href="index.php?filter=completed"><span class="glyphicon glyphicon-ok"></span> Completado</a></li>
    				</ul>
  				</div>

	  			<div class="btn-group btn-group-xs" role="group">
	    			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
	      				<span class="glyphicon glyphicon-filter"></span> <small>Por prioridad</small>
	      				<span class="caret"></span>
	    			</button>
	    			<ul class="dropdown-menu" role="menu">
	      				<li class="small"><a href="index.php?filter=low"><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star-empty"></span><span class="glyphicon glyphicon-star-empty"></span> Baja </a></li>
	      				<li class="small"><a href="index.php?filter=normal"><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star-empty"></span> Normal</a></li>
	      				<li class="small"><a href="index.php?filter=high"><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span> Alta</a></li>
	    			</ul>
	  			</div>

	  			<div class="btn-group btn-group-xs" role="group">
	  				<a role="button" class="btn btn-default" href="index.php"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> <small>Reiniciar filtros</small></a>
	  			</div>
			</div>
			
			<div class="panel panel-default small">
  				<div class="panel-heading"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> <strong>Tickets</strong></div>
  				<div class="panel-body">
	  				<div class="table-responsive">
		  				<table class="table table-striped table-hover table-condensed">
		  					<tr>
		  						<th><span class="glyphicon glyphicon-certificate" aria-hidden="true"></span></th>
		  						<th>Título <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span></th>
		  						<th>Estado <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span></th>
		  						<th>Prioridad <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span></th>
		  						<th>Asignado <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></th>
		  						<th>Finalizado <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></th>
		  						<th>Asignatario <span class="glyphicon glyphicon-user" aria-hidden="true"></span></th>
		  						<th>Opciones <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></th>
		  					</tr>
		  					<?php check_filter(); ?>
	  					</table>
	  				</div>
  				</div>
			</div>
		</section>
	</main>

	<footer class="navbar navbar-default navbar-static-bottom small">
		<div class="container-fluid">
			<div class="row">
				<p class="navbar-text"><abbr title="Sistema de Seguimiento de Errores AGNES" class="initialism"><strong>Agnes</abbr> &#169; 2015 - <i>Bug Tracking System</i></strong></p>
				<i><p class="navbar-text small">Software licensed by <a target="_blank" rel="author" hreflang="es" type="text/html" href="http://cabrera-dcc.github.io">Daniel Cabrera Cebrero</a> under a GNU General Public License (<a rel="license" target="blank" hreflang="en" type="text/html" href="https://github.com/cabrera-dcc/agnes_bts/blob/master/LICENSE">GPLv3</a>)</p>
				<p class="navbar-text small">Design and theme under <a rel="license" target="_blank" hreflang="en" type="text/html" href="http://opensource.org/licenses/MIT">MIT License</a></p></i>
			</div>
		</div>
	</footer>

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.get-url-params.js"></script>
	<script type="text/javascript" src="js/listener.js"></script>
</body>
</html>