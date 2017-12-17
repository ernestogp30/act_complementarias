<?php
require_once('../conexion/conexion.php');
$rfc_Trabajador = isset($_GET['rfc']) ? $_GET['rfc'] : 0 ;


$sql = 'DELETE FROM instructor WHERE rfc = ?';


$statement = $pdo->prepare($sql);
$statement->execute(array($rfc_Trabajador));

$results = $statement->fetchAll();
header('Location: actualizar_instructor.php');
