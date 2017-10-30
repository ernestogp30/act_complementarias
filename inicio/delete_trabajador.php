<?php
require_once('../conexion/conexion.php');
$rfc_Trabajador = isset($_GET['RFC']) ? $_GET['RFC'] : 0 ;


$sql = 'DELETE FROM trabajador WHERE RFC = ?';


$statement = $pdo->prepare($sql);
$statement->execute(array($rfc_Trabajador));

$results = $statement->fetchAll();
header('Location: actualizar_trabajador.php');
