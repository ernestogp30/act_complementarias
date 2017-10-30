<?php
	require_once('../conexion/conexion.php');

    $titulo='Actividades Complementarias';
	$sql = 'SELECT * FROM act_complementaria WHERE clave_act LIKE :search';
    $search_terms = isset($_GET['clave_act'])? $_GET['clave_act'] : '';
    $arr_sql_terms[':search'] = '%' . $search_terms . '%';

	$statement = $pdo->prepare($sql);
	$statement->execute($arr_sql_terms);
	$results = $statement->fetchAll();

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
					<h2>Buscar Actividad Complementaria</h2>
					<hr>
					<form method="get">
                            <div class="row">
                                <div class="col 12">
                                    <label>Ingrese la actividad elegida
                                    <input type="text" name="clave_act" placeholder="ej. 1">
                                    <input class="button" type="submit" value="BUSCAR"/>
                                    </label>
                            </div>
                    </form>
					<pre>
						
					</pre>
						
					<h3>Estudiantes</h3>
					<hr>
					<table class="striped">
				        <thead>
				          <tr>
				              <th>Clave de la Actividad</th>
				              <th>Nombre de la Actividad</th>
				          </tr>
				        </thead>
				        <tbody>
				        	<?php
				        		foreach($results as $rs2) {
				        	?>
				          <tr>
							<td><?php echo $rs2['clave_act']?></td>
							<td><?php echo $rs2['nombre_actividad']?></td>
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
                            &copy; 2017 Ernesto Garcia Pineda
                        </div>
                    </div>
                </footer>
            </div>
		</div>
	</body>
</html>