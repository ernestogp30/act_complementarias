<?php
require_once('../conexion/conexion.php');
$claveActividad = isset($_GET['clave_act']) ? $_GET['clave_act'] : 0 ;


$sql = 'DELETE FROM act_complementaria WHERE clave_act = ?';


$statement = $pdo->prepare($sql);
$statement->execute(array($claveActividad));

$results = $statement->fetchAll();
header('Location: actualizar_actividad.php');
