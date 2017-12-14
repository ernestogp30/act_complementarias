<?php
	require_once('../conexion/conexion.php');
?>
<?php 
	$sql = 'SELECT * FROM estudiante ORDER BY semestre';

	$statement = $pdo->prepare($sql);
	$statement->execute(array());
	$results = $statement->fetchAll();

	$sql_status = 'SELECT estudiante.*, carrera.carreraNombre FROM estudiante INNER JOIN carrera ON carrera.clave = estudiante.carrera_clave';
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
		<title>PHP & SQL</title>
		<link rel="stylesheet" href="../css/materialize.min.css">
		</head>

	<body>
		<!--Import jQuery before materialize.js-->
    	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    	<script type="text/javascript" src="js/materialize.min.js"></script>
    	<div class="navbar-fixed">
        <nav class="teal lighten-2">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo right">Instituto Tecnologico de Cd. Altamirano</a>
                <ul id="nav-mobile" class="left side-nav">
                    <li><a href="index.php">Inicio</a></li>
                </ul>
            </div>
        </nav>
    </div>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h2>Lista de Alumnos Inscritos</h2>
					<hr>
					<h3>Generacion 2015</h3>
					<pre>
						
					</pre>
						
					<h3>Estudiantes</h3>
					<hr>
					<table class="striped">
				        <thead>
				          <tr>
				              <th>No Control</th>
				              <th>Nombre</th>
				              <th>Apellido Paterno</th>
				              <th>Apellido Materno</th>
				              <th>Semestre</th>
				              <th>Clave Carrera</th>
				          </tr>
				        </thead>
				        <tbody>
				        	<?php 
				        		foreach($results as $rs) {
				        	?>
				          <tr>
							<td><?php echo $rs['No_contro']?></td>
							<td><?php echo $rs['NombreEstudiante']?></td>
							<td><?php echo $rs['apellidoPaterno_Estudiante']?></td>
							<td><?php echo $rs['apellidoMaterno_Estudiante']?></td>
							<td><?php echo $rs['semestre']?></td>
							<td><?php echo $rs['carrera_clave']?></td>
				          </tr>
				          <?php 
				          	}
				          ?>
				        </tbody>
				    </table>

					  <tbody>



					</tbody>
					</table>
				</div>
			</div>
			<div class="col s12">
                <footer class="page-footer teal lighten-2">
                    <div class="footer-copyright">
                        <div class="container">
                            &copy; 2017 Ernesto Quintín García Pineda
                        </div>
                    </div>
                </footer>
            </div>
		</div>
	</body>
</html>