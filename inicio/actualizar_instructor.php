<?php
	require_once('../conexion/conexion.php');
	$title = 'Instructores';
	$title_menu = 'Instructores';

	// Consulta para mostrar los datos de la tabla "Trabajador"
	$sql_trabajador = 'SELECT * FROM instructor';
	$statement = $pdo->prepare($sql_trabajador);
	$statement->execute();
	$results = $statement->fetchAll();

	$show_form = FALSE;

	if($_POST)
	{
	  	//TODO:UPDATE ARTICLE
	  	$sql_update_details = 'UPDATE instructor SET rfc = ?, nombre_instructor = ?, apaterno_instructor = ?, amaterno_instructor = ?, act_complementaria_clave_act = ? WHERE rfc = ?';

		$rfcInstructor = isset($_GET['rfc']) ? $_GET['rfc']: '';
		$rfcInstructor_2 = isset($_POST['rfcInstructor_2']) ? $_POST['rfcInstructor_2']: '';
  		$ninstructor = isset($_POST['nombre_instructor']) ? $_POST['nombre_instructor']: '';
  		$apinstructor = isset($_POST['apaterno_instructor']) ? $_POST['apaterno_instructor']: '';
  		$aminstructor = isset($_POST['amaterno_instructor']) ? $_POST['amaterno_instructor']: '';
  		$ClaveActi = isset($_POST['act_complementaria_clave_act']) ? $_POST['act_complementaria_clave_act']: '';
 
echo $RFCtrabajador;
echo $amaterno_trabajador;	


	  	$statement_update_details = $pdo->prepare($sql_update_details);
	  	$statement_update_details->execute(array($rfcInstructoror_2,$ninstructor,$apinstructor,$aminstructor,$ClaveActi, $rfcInstructor));
	  	header('Location: actualizar_instructor.php');
	}

	if(isset( $_GET['rfc'] ) )
	{
		//TODO: GET DETAILS
		$show_form = TRUE;
		$sql_update = 'SELECT * FROM instructor WHERE rfc = ?';
		$rfcTrabajador = isset( $_GET['rfc']) ? $_GET['rfc'] : 0;

		$statement_update = $pdo->prepare($sql_update);
		$statement_update->execute(array($rfcTrabajador));
		$result_details = $statement_update->fetchAll();
		$rs_details = $result_details[0];

	}

	$sql_status = 'SELECT instructor .*, act_complementaria.nombre_actividad FROM instructor INNER JOIN act_complementaria ON act_complementaria.clave_act = instructor.act_complementaria_clave_act ORDER BY rfc';
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
          							<input value="<?php echo $rs_details['rfc'] ?>" name="rfcInstructor_2" type="text">
        						</div>
							</div>
							<div class="row">
        						<div class="input-field col s4">
      						
          							<input value="<?php echo $rs_details['nombre_instructor'] ?>" name="ninstructor" type="text">
        						</div>
        						
        						<div class="input-field col s4">
          							<input value="<?php echo $rs_details['apaterno_instructor'] ?>" name="apinstructor" type="text">
        						</div>
        						
        						<div class="input-field col s4">
          						<input value="<?php echo $rs_details['amaterno_instructor'] ?>" name="aminstructor" type="text">
        						</div>
        					</div>
        					<div class="row">
								<div class="input-field col s12">
          							<input value="<?php echo $rs_details['act_complementaria_clave_act'] ?>" name="ClaveActi" type="text">
        						</div>
							</div>
        					
        				<input class="btn waves-effect waves-light" type="submit" value="Modificar" />
						</form>
						<?php } ?>
				    <h3>Instructores</h3>
				    <table class="striped">
					  <thead>
					    <tr>
					    	<th>RFC Instructor</th>
				          	<th>Nombre</th>
				            <th>Apellido Paterno</th>
				            <th>Apellido Materno</th>
				            <th>Actividad Impartida</th>
				        
                            <th colspan="2">Acción</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php
				        	foreach($results_status as $rs2) {
				        ?>
					    <tr>
					    	<td><?php echo $rs2['rfc']?></td>
							<td><?php echo $rs2['nombre_instructor']?></td>
							<td><?php echo $rs2['apaterno_instructor']?></td>
							<td><?php echo $rs2['amaterno_instructor']?></td>
							<td><?php echo $rs2['act_complementaria_clave_act']?></td>
							
							<td><a class="btn waves-effect waves-light" href="actualizar_instructor.php
							?rfc=<?php echo $rs2['rfc']; ?>">VER DETALLES</a></td>
                            <td><a class="btn waves-effect waves-light red" onclick="delete_instructor(<?php echo $rs2['rfc']; ?>)" href="#">ELIMINAR</a>
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