<?php
require_once('../conexion/conexion.php');
$noControl = isset($_GET['No_contro']) ? $_GET['No_contro'] : 0 ;


$sql = 'DELETE FROM estudiante WHERE No_contro = ?';


$statement = $pdo->prepare($sql);
$statement->execute(array($noControl));

$results = $statement->fetchAll();
header('Location: actualizar_estudiantes.php');
