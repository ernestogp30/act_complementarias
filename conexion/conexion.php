<?php

$dsn = 'mysql:dbname=a_complementarias;host=localhost';
$user = 'netogp30';
$password = '6UB8AdjvMrjq8Me6';

try{

	$pdo = new PDO(	$dsn, 
					$user, 
					$password
					);

}catch( PDOException $e ){
	echo 'Error al conectarnos: ' . $e->getMessage();
}
?>