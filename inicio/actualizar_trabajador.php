<?php
	require_once('../conexion/conexion.php');
	$title = 'Trabajadores';
	$title_menu = 'Trabajadores';

	// Consulta para mostrar los datos de la tabla "Trabajador"
	$sql_trabajador = 'SELECT * FROM trabajador';
	$statement = $pdo->prepare($sql_trabajador);
	$statement->execute();
	$results = $statement->fetchAll();

	$show_form = FALSE;

	if($_POST)
	{
	  	//TODO:UPDATE ARTICLE
	  	$sql_update_details = 'UPDATE trabajador SET RFC = ?, NombreTrabajador = ?, apellido_p_trabajador = ?, apellido_m_trabajador = ?, clave_presupuestal = ? WHERE RFC = ?';

		$rfcTrabajador = isset($_GET['RFC']) ? $_GET['RFC']: '';
		$rfcTrabajador_2 = isset($_POST['rfcTrabajador_2']) ? $_POST['rfcTrabajador_2']: '';
  		$nombreTrabajador = isset($_POST['NombreTrabajador']) ? $_POST['NombreTrabajador']: '';
  		$apellidoPTrabajador = isset($_POST['apellido_p_trabajador']) ? $_POST['apellido_p_trabajador']: '';
  		$apellidoMTrabajador = isset($_POST['apellido_m_trabajador']) ? $_POST['apellido_m_trabajador']: '';
  		$ClavePresupuestal = isset($_POST['clave_presupuestal']) ? $_POST['clave_presupuestal']: '';
 
echo $RFCtrabajador;
echo $amaterno_trabajador;	


	  	$statement_update_details = $pdo->prepare($sql_update_details);
	  	$statement_update_details->execute(array($rfcTrabajador_2,$nombreTrabajador,$apellidoPTrabajador,$apellidoMTrabajador,$ClavePresupuestal, $rfcTrabajador));
	  	header('Location: actualizar_trabajador.php');
	}

	if(isset( $_GET['RFC'] ) )
	{
		//TODO: GET DETAILS
		$show_form = TRUE;
		$sql_update = 'SELECT * FROM trabajador WHERE RFC = ?';
		$rfcTrabajador = isset( $_GET['RFC']) ? $_GET['RFC'] : 0;

		$statement_update = $pdo->prepare($sql_update);
		$statement_update->execute(array($rfcTrabajador));
		$result_details = $statement_update->fetchAll();
		$rs_details = $result_details[0];

	}

	$sql_status = 'SELECT * FROM trabajador';
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
          							<input value="<?php echo $rs_details['RFC'] ?>" name="rfcTrabajador_2" type="text">
        						</div>
							</div>
							<div class="row">
        						<div class="input-field col s4">
      						
          							<input value="<?php echo $rs_details['NombreTrabajador'] ?>" name="nombreTrabajador" type="text">
        						</div>
        						
        						<div class="input-field col s4">
          							<input value="<?php echo $rs_details['apellido_p_trabajador'] ?>" name="apellidoPTrabajador" type="text">
        						</div>
        						
        						<div class="input-field col s4">
          						<input value="<?php echo $rs_details['apellido_m_trabajador'] ?>" name="apellidoMTrabajador" type="text">
        						</div>
        					</div>
        					<div class="row">
								<div class="input-field col s12">
          							<input value="<?php echo $rs_details['clave_presupuestal'] ?>" name="ClavePresupuestal" type="text">
        						</div>
							</div>
        					
        				<input class="btn waves-effect waves-light" type="submit" value="Modificar" />
						</form>
						<?php } ?>
				    <h3>Trabajadores</h3>
				    <table class="striped">
					  <thead>
					    <tr>
					    	<th>RFC</th>
				          	<th>Nombre</th>
				            <th>Apellido Paterno</th>
				            <th>Apellido Materno</th>
				            <th>Clave Presupuestal</th>
				           
                            <th colspan="2">Acción</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php
				        	foreach($results_status as $rs2) {
				        ?>
					    <tr>
					    	<td><?php echo $rs2['RFC']?></td>
							<td><?php echo $rs2['NombreTrabajador']?></td>
							<td><?php echo $rs2['apellido_p_trabajador']?></td>
							<td><?php echo $rs2['apellido_m_trabajador']?></td>
							<td><?php echo $rs2['clave_presupuestal']?></td>
							<td><a class="btn waves-effect waves-light" href="actualizar_trabajador.php
							?RFC=<?php echo $rs2['RFC']; ?>">VER DETALLES</a></td>
                            <td><a class="btn waves-effect waves-light red" onclick="delete_trabajador(<?php echo $rs2['RFC']; ?>)" href="#">ELIMINAR</a>
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