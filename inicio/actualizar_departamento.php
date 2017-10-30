<?php
	require_once('../conexion/conexion.php');
	$title = 'Departamentos';
	$title_menu = 'Departamentos';

	// Consulta para mostrar los datos de la tabla "Carrera"
	$sql_depto = 'SELECT * FROM trabajador';
	$statement = $pdo->prepare($sql_depto);
	$statement->execute();
	$results = $statement->fetchAll();

	$show_form = FALSE;

	if($_POST)
	{
	  	//TODO:UPDATE ARTICLE
	  	$sql_update_details = 'UPDATE departamento SET rfc_depto = ?, DeptoNombre = ?,trabajador_rfc = ? WHERE rfc_depto = ?';

		$RFCdepto = isset($_GET['rfcdepto']) ? $_GET['rfcdepto']: '';
		$RFCdepto_2 = isset($_POST['RFCdepto_2']) ? $_POST['RFCdepto_2_2']: '';
  		$nombreDepto = isset($_POST['DeptoNombre']) ? $_POST['DeptoNombre']: '';
  		$TrabajadorRFC = isset($_POST['trabajadorRfc']) ? $_POST['trabajadorRfc']: '';


	  	$statement_update_details = $pdo->prepare($sql_update_details);
	  	$statement_update_details->execute(array($RFCdepto_2,$nombreDepto,$nombreDepto,$RFCdepto));
	  	header('Location: actualizar_departamento.php');
	}

	if(isset( $_GET['rfc_depto'] ) )
	{
		//TODO: GET DETAILS
		$show_form = TRUE;
		$sql_update = 'SELECT departamento.*, trabajador.NombreTrabajador FROM departamento INNER JOIN trabajador ON trabajador.RFC = departamento.trabajador_rfc WHERE rfc_depto = ?';
		$RFCdepto= isset( $_GET['rfc_depto']) ? $_GET['rfc_depto'] : 0;

		$statement_update = $pdo->prepare($sql_update);
		$statement_update->execute(array($RFCdepto));
		$result_details = $statement_update->fetchAll();
		$rs_details = $result_details[0];

	}

	$sql_status = 'SELECT departamento.*, trabajador.NombreTrabajador FROM departamento INNER JOIN trabajador ON trabajador.RFC = departamento.trabajador_rfc';
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
          							<input value="<?php echo $rs_details['rfc_depto'] ?>" name="RFCdepto_2" type="text">
        						</div>
							</div>
							<div class="row">
        						<div class="input-field col s12">

          							<input value="<?php echo $rs_details['DeptoNombre'] ?>" name="nombreDepto" type="text">
        						</div>
        						<div class="input-field col s12">

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <select name="">
                                                <option value="" disabled selected>Elige un Jefe de Departamento</option>
                                                <?php
                                                foreach($results as $rs) {
                                                    ?>
                                                    <option value="<?php echo $rs['RFC']?>"><?php echo $rs['NombreTrabajador']?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            <label>Departamentos</label>
                                        </div>
                                    </div>
        				<input class="btn waves-effect waves-light" type="submit" value="Modificar" />
						</form>
						<?php } ?>
				    <h3>Departamentos</h3>
				    <table class="striped">
					  <thead>
					    <tr>
					    	<th>RFC del Deparetamento</th>
				          	<th>Nombre</th>
				            <th>Responsable</th>

                            <th colspan="2">Acción</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php
				        	foreach($results_status as $rs2) {
				        ?>
					    <tr>
					    	<td><?php echo $rs2['rfc_depto']?></td>
							<td><?php echo $rs2['DeptoNombre']?></td>
							<td><?php echo $rs2['trabajador_rfc']?></td>
							<td><a class="btn waves-effect waves-light" href="actualizar_departamento.php
							?rfc_depto=<?php echo $rs2['rfc_depto']; ?>">VER DETALLES</a></td>
                            <td><a class="btn waves-effect waves-light red" onclick="delete_departamento(<?php echo $rs2['rfc_depto']; ?>)" href="#">ELIMINAR</a>
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