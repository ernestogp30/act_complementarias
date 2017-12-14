<?php
require_once('../conexion/conexion.php');
$title = 'Agregar un nuevo registro';
$sql_carrera = 'SELECT * FROM carrera';

$statement = $pdo->prepare($sql_carrera);
$statement->execute();
$results = $statement->fetchAll();

if( $_POST )
{

    $sql_insert = 'INSERT INTO carrera ( Clave, nombre_carrera ) VALUES( ?, ? )';

    $ClaveCarrera = isset($_POST['claveCarrera']) ? $_POST['claveCarrera']: '';
    $nombreCarrera= isset($_POST['NombreCarrera']) ? $_POST['NombreCarrera']: '';


    $statement_insert = $pdo->prepare($sql_insert);
    $statement_insert->execute(array($ClaveCarrera,$nombreCarrera));

}

$sql_status = 'SELECT * FROM carrera ORDER BY Clave';
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
            <h2>Agregar una nueva carrea</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <form method="post" class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="Clave de la Carrera" name="ClaveCarrera" type="text">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4">
                    <i class="material-icons prefix"></i>
                    <input placeholder="Nombre" name="nombreCarrera" type="text">
                </div>


            <input class="btn waves-effect waves-light" type="submit" value="Agregar" />
        </form>
    </div>
    <div class="row">
        <div class="col s12">
            <h3>Carreras</h3>
            <table class="striped">
                <thead>
                <tr>
                    <th>Clave de la Carrera</th>
                    <th>Nombre</th>

                </tr>
                </thead>
                <tbody>
                <?php
                foreach($results_status as $rs2) {
                    ?>
                    <tr>
                        <td><?php echo $rs2['Clave']?></td>
                        <td><?php echo $rs2['nombre_carrera']?></td>

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