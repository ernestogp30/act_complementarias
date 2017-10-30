<?php
require_once('../conexion/conexion.php');
$rfcDepto = isset($_GET['rfc_depto']) ? $_GET['rfc_depto'] : 0 ;


$sql = 'DELETE FROM departamento WHERE rfc_depto = ?';


$statement = $pdo->prepare($sql);
$statement->execute(array($rfcDepto));

$results = $statement->fetchAll();
header('Location: actualizar_departamento.php');
