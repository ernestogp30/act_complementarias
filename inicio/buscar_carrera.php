<?php
	require_once('../conexion/conexion.php');

    $titulo='Carreras';
	$sql = 'SELECT * FROM carrera WHERE Clave LIKE :search';
    $search_terms = isset($_GET['Clave'])? $_GET['Clave'] : '';
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
					<h2>Buscador sencillo con LIKE</h2>
					<hr>
					<form method="get">
                            <div class="row">
                                <div class="col 12">
                                    <label>Ingrese la clave de la Carrera
                                    <input type="text" name="Clave" placeholder="ej. INSC-2015-220 ">
                                    <input class="button" type="submit" value="BUSCAR"/>
                                    </label>
                            </div>
                    </form>
					<pre>
						
					</pre>
						
					<h3>Carreras</h3>
					<hr>
					<table class="striped">
				        <thead>
				          <tr>
				              <th>Clave de la Carrera</th>
				              <th>Nombre</th>


				          </tr>
				        </thead>
				        <tbody>
				        	<?php
				        		foreach($results as $rs) {
				        	?>
				          <tr>
							<td><?php echo $rs['Clave']?></td>
							<td><?php echo $rs['nombre_carrera']?></td>


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