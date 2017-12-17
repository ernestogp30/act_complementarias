<?php
require_once('../conexion/conexion.php');
$title = 'Agregar un nuevo registro';
$sql_trabajador = 'SELECT * FROM trabajador';

$statement = $pdo->prepare($sql_trabajador);
$statement->execute();
$results = $statement->fetchAll();

if( $_POST )
{

    $sql_insert = 'INSERT INTO trabajador ( RFC, NombreTrabajador, apellido_p_trabajador, apellido_m_trabajador, clave_presupuestal ) VALUES( ?, ?, ?, ?, ?  )';

    $RFCtrabajador = isset($_POST['RFCtrabajador']) ? $_POST['RFCtrabajador']: '';
    $nombreTrabajador = isset($_POST['nombreTrabajador']) ? $_POST['nombreTrabajador']: '';
    $apaterno_trabajador = isset($_POST['apaterno_trabajador']) ? $_POST['apaterno_trabajador']: '';
    $amaterno_trabajador= isset($_POST['amaterno_trabajador']) ? $_POST['amaterno_trabajador']: '';
    $clavePresupuestal = isset($_POST['clavePresupuestal']) ? $_POST['clavePresupuestal']: '';



    $statement_insert = $pdo->prepare($sql_insert);
    $statement_insert->execute(array($RFCtrabajador,$nombreTrabajador ,$apaterno_trabajador, $amaterno_trabajador, $clavePresupuestal));

}

$sql_status = 'SELECT * FROM trabajador ORDER BY RFC';
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
    <title><?php echo $title?></title>
    <link rel="stylesheet" href="../css/materialize.css">
</head>

<body>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>
<div class="navbar-fixed">
    <nav class="teal lighten-1">
        <div class="nav-wrapper">
            <a href="#" class="brand-logo right">Estudiantes</a>
            <ul id="nav-mobile" class="left side-nav">
                <li><a href="index.php">Inicio</a></li>
            </ul>
        </div>
    </nav>
</div>
<div class="container">
    <div class="row">
        <div class="col s12">
            <h2>Agregar un nuevo trabajador</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <form method="post" class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="RFC Trabajador" name="RFCtrabajador" type="text">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4">
                    <i class="material-icons prefix"></i>
                    <input placeholder="Nombre" name="nombreTrabajador" type="text">
                </div>
                <div class="input-field col s4">
                    <i class="material-icons prefix"></i>
                    <input placeholder="Apellido Paterno" name="apaterno_trabajador" type="text">
                </div>
                <div class="input-field col s4">
                    <i class="material-icons prefix"></i>
                    <input placeholder="Apellido Materno" name="amaterno_trabajador" type="text">
                </div>
            </div>


            <input class="btn waves-effect waves-light" type="submit" value="Agregar" />
        </form>
    </div>
    <div class="row">
        <div class="col s12">
            <h3>Trabajadores</h3>
            <table class="striped">
                <thead>
                <tr>
                    <th>RFC del Trabajador</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Clave Presupuestal</th>

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
                    &copy; 2017 Ernesto Quintín García Pineda
                </div>
            </div>
        </footer>
    </div>
</div>
<!--  Scripts-->
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>
<script>
    $(document).ready(function() {
        $('select').material_select();
    });
</script>
</body>
</html>