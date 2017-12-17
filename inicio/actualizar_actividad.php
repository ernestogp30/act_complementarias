<?php
	require_once('../conexion/conexion.php');
	$title = 'Actividades Complementarias';
	$title_menu = 'Actividades Complementarias';

	// Consulta para mostrar los datos de la tabla "Carrera"
	$sql_act = 'SELECT * FROM act_complementaria';
	$statement = $pdo->prepare($sql_act);
	$statement->execute();
	$results = $statement->fetchAll();

	$show_form = FALSE;

	if($_POST)
	{
	  	//TODO:UPDATE ARTICLE
	  	$sql_update_details = 'UPDATE act_complementaria SET clave_act = ?, nombre_actividad = ? WHERE clave_act = ?';

		$ClaveActividad = isset($_GET['clave_act']) ? $_GET['clave_act']: '';
		$ClaveActividad_2 = isset($_POST['ClaveActividad_2']) ? $_POST['ClaveActividad_2']: '';
  		$ActividadNombre = isset($_POST['nombre_actividad']) ? $_POST['nombre_actividad']: '';


	  	$statement_update_details = $pdo->prepare($sql_update_details);
	  	$statement_update_details->execute(array($ClaveActividad_2,$ActividadNombre, $ClaveActividad_2));
	  	header('Location: actualizar_actividad.php');
	}

	if(isset( $_GET['clave_act'] ) )
	{
		//TODO: GET DETAILS
		$show_form = TRUE;
		$sql_update = 'SELECT * FROM act_complementaria  WHERE clave_act = ?';
		$noControl = isset( $_GET['clave_act']) ? $_GET['clave_act'] : 0;

		$statement_update = $pdo->prepare($sql_update);
		$statement_update->execute(array($noControl));
		$result_details = $statement_update->fetchAll();
		$rs_details = $result_details[0];

	}

	$sql_status = 'SELECT * FROM act_complementaria';
$statement_status = $pdo->prepare($sql_status);
$statement_status->execute();
$results_status = $statement_status->fetchAll();

?>
<?php
	include('../extend/header.php');
?>

		<div class="container">
			<div class="row">
				<div class="col s12">
					<h2>Proyecto de actividades complementarias</h2>
					<hr>
					<?php
						if( $show_form )
						{
						?>
						<form method="post">
							<div class="row">
								<div class="input-field col s12">
          							<input value="<?php echo $rs_details['clave_act'] ?>" name="ClaveActividad_2" type="text">
        						</div>
							</div>
							<div class="row">
        						<div class="input-field col s4">
          							<input value="<?php echo $rs_details['nombre_actividad'] ?>" name="ActividadNombre" type="text">
        					</div>
        						
        				<input class="btn waves-effect waves-light" type="submit" value="Modificar" />
						</form>
						<?php } ?>
				    <h3>Estudiantes</h3>
				    <table class="striped">
					  <thead>
					    <tr>
					    	<th>Clave</th>
				          	<th>Nombre</th>
				          
                            <th colspan="2">Acción</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php
				        	foreach($results_status as $rs2) {
				        ?>
					    <tr>
					    	<td><?php echo $rs2['clave_act']?></td>
							<td><?php echo $rs2['nombre_actividad']?></td>
							
							<td><a class="btn waves-effect waves-light" href="actualizar_actividad.php
							?clave_act=<?php echo $rs2['clave_act']; ?>">VER DETALLES</a></td>
                            <td><a class="btn waves-effect waves-light red" onclick="delete_actividad(<?php echo $rs2['clave_act']; ?>)" href="#">ELIMINAR</a>
					    </tr>
					    <?php
				          	}
				        ?>
					</tbody>
					</table>
				</div>
			</div>
			<?php
				include('../extend/footer.php');
			?>