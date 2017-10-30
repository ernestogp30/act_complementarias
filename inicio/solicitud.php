<?php
	require_once('../conexion/conexion.php');
?>
<?php
    $titulo='Solicitudes';
	$sql = 'SELECT * FROM solicitud ';

	$statement = $pdo->prepare($sql);
	$statement->execute(array());
	$results = $statement->fetchAll();
	$sql_status = 'SELECT solicitud.*, instituto.clave FROM solicitud INNER JOIN instituto ON instituto.clave = solicitud.instituto_clave';
$statement_status = $pdo->prepare($sql_status);
$statement_status->execute();
$results_status = $statement_status->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<title><?php echo $titulo ?></title>
		<link rel="stylesheet" href="../css/materialize.min.css">
		</head>

	<body>
		<!--Import jQuery before materialize.js-->
    	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    	<script type="text/javascript" src="js/materialize.min.js"></script>
    	<div class="navbar-fixed">
        <nav class="teal lighten-2">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo right">Instituto Tecnologico de Cd. Altamirano </a>
                <ul id="nav-mobile" class="left side-nav">
                    <li><a href="index.php">Inicio</a></li>
                </ul>
            </div>
        </nav>
    </div>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h2>Ejecución de una sentencia SQL</h2>
					<hr>
					<h3>Consultas</h3>
					<pre>
						
					</pre>
						
					<h3>Registro de Actividades Complementarias</h3>
					<hr>
					<table class="striped">
				        <thead>
				          <tr>
				              <th>Folio</th>
				              <th>Asunto</th>
				              <th>Fecha de Registro</th>
				              <th>Lugar</th>
				              <th>Clave del Instituto</th>
				              <th>RFC del Instructor</th>
                              <th>No. de Control del Estudiante</th>
				          </tr>
				        </thead>
				        <tbody>
				        	<?php 
				        		foreach($results as $rs) {
				        	?>
				          <tr>
							<td><?php echo $rs['folio']?></td>
							<td><?php echo $rs['asunto']?></td>
							<td><?php echo $rs['fecha']?></td>
							<td><?php echo $rs['lugar']?></td>
							<td><?php echo $rs['instituto_clave']?></td>
							<td><?php echo $rs['instructor_rfc']?></td>
                              <td><?php echo $rs['estudiante_No_contro']?></td>
				          </tr>
				          <?php 
				          	}
				          ?>
				        </tbody>
				    </table>

				</div>
			</div>
			<div class="col s12">
                <footer class="page-footer teal lighten-2">
                    <div class="footer-copyright">
                        <div class="container">
                            &copy; 2017 Leonel Gonz&aacute;lez Vidales
                        </div>
                    </div>
                </footer>
            </div>
		</div>
	</body>
</html>