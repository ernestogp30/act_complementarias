<?php
require_once('../conexion/conexion.php');
$title = 'Agregar un nuevo registro';
$sql_depto = 'SELECT * FROM trabajador';

$statement = $pdo->prepare($sql_depto);
$statement->execute();
$results = $statement->fetchAll();

if( $_POST )
{

    $sql_insert = 'INSERT INTO departamento ( rfc_depto, DeptoNombre, trabajador_rfc) VALUES( ?, ?, ? )';

    $deptoRFC = isset($_POST['deptoRFC']) ? $_POST['deptoRFC']: '';
    $nombreDepartamento = isset($_POST['nombreDepartamento']) ? $_POST['nombreDepartamento']: '';
    $trabajadorRFC = isset($_POST['trabajadorRFC']) ? $_POST['trabajadorRFC']: '';



    $statement_insert = $pdo->prepare($sql_insert);
    $statement_insert->execute(array($deptoRFC,$nombreDepartamento ,$trabajadorRFC));

}

$sql_status = 'SELECT departamento.*, trabajador.NombreTrabajador FROM departamento INNER JOIN trabajador ON trabajador.RFC = departamento.trabajador_RFC' ;
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
            <h2>Registrar Departamento</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <form method="post" class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="RFC del Depto" name="deptoRFC" type="text">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4">
                    <i class="material-icons prefix"></i>
                    <input placeholder="Nombre Depto" name="nombreDepartamento" type="text">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="trabajadorRFC">
                        <option value="" disabled selected>Asigna un nuevo trabajador</option>
                        <?php
                        foreach($results as $rs) {
                            ?>
                            <option value="<?php echo $rs['RFC']?>"><?php echo $rs['NombreTrabajador']?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <label>Trabajadores</label>
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
                    <th>RFC del Departamento</th>
                    <th>Nombre del Depto.</th>
                    <th>RFC del Trabajador</th>


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