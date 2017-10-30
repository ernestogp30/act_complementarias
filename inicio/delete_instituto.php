<?php
require_once('../conexion/conexion.php');
$claveInstituto= isset($_GET['clave']) ? $_GET['clave'] : 0 ;


$sql = 'DELETE FROM instituto WHERE clave = ?';


$statement = $pdo->prepare($sql);
$statement->execute(array($claveInstituto));

$results = $statement->fetchAll();
header('Location: insert_instituto.php');
