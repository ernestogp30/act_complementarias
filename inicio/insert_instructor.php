<?php
require_once('../conexion/conexion.php');
$title = 'Agregar un nuevo registro';
$sql_actividad = 'SELECT * FROM act_complementaria';

$statement = $pdo->prepare($sql_actividad);
$statement->execute();
$results = $statement->fetchAll();

if( $_POST )
{

    $sql_insert = 'INSERT INTO instructor ( rfc, nombre_instructor, apaterno_instructor, amaterno_instructor,  act_complementaria_clave_act ) VALUES( ?, ?, ?, ?, ? )';

    $rfcInstructor = isset($_POST['RFC']) ? $_POST['RFC']: '';
    $nombreInstructor = isset($_POST['nombreInstructor']) ? $_POST['nombreInstructor']: '';
    $apellido_p_Instructor = isset($_POST['apellido_p_Instructor']) ? $_POST['apellido_p_Instructor']: '';
    $apellido_m_Instructor = isset($_POST['apellido_m_Instructor']) ? $_POST['apellido_m_Instructor']: '';
    $claveActividad = isset($_POST['claveActividad']) ? $_POST['claveActividad']: '';
    $nombreActividad = isset($_POST['nombreActividad']) ? $_POST['nombreActividad']: '';

    $statement_insert = $pdo->prepare($sql_insert);
    $statement_insert->execute(array($rfcInstructor,$nombreInstructor,$apellido_p_Instructor, $apellido_m_Instructor,$claveActividad,));

}

$sql_status = 'SELECT instructor .*, act_complementaria.nombre_actividad FROM instructor INNER JOIN act_complementaria ON act_complementaria.clave_act = instructor.act_complementaria_clave_act ORDER BY rfc';
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
            <a href="#" class="brand-logo right">Instructores</a>
            <ul id="nav-mobile" class="left side-nav">
                <li><a href="index.php">Inicio</a></li>
            </ul>
        </div>
    </nav>
</div>
<div class="container">
    <div class="row">
        <div class="col s12">
            <h2>Agregar un nuevo Instructor</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <form method="post" class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="RFC" name="rfcInstructor" type="text">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4">
                    <i class="material-icons prefix"></i>
                    <input placeholder="Nombre" name="nombreInstructor" type="text">
                </div>
                <div class="input-field col s4">
                    <i class="material-icons prefix"></i>
                    <input placeholder="Apellido Paterno" name="apellido_p_Instructor" type="text">
                </div>
                <div class="input-field col s4">
                    <i class="material-icons prefix"></i>
                    <input placeholder="Apellido Materno" name="apellido_m_Instructor" type="text">
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <select name="claveActividad">
                        <option value="" disabled selected>Elige la Actividad a impartir</option>
                        <?php
                        foreach($results as $rs) {
                            ?>
                            <option value="<?php echo $rs['clave_act']?>"><?php echo $rs['nombre_actividad']?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <label>Actividades</label>
                </div>
            </div>
            <input class="btn waves-effect waves-light" type="submit" value="Agregar" />
        </form>
    </div>
    <div class="row">
        <div class="col s12">
            <h3>Instructores</h3>
            <table class="striped">
                <thead>
                <tr>
                    <th>RFC</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Clave de la Actividad</th>
                    <th>Nombre de la Actividad</th>

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