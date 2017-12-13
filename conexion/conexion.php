<?php

$dsn = 'mysql:dbname=a_complementarias;host=localhost';
$user = 'ernestogp30';
$password = '2bRHmKf3RMCdZs6L';

try{

	$pdo = new pdo(	$dsn, 
					$user, 
					$password
					);

}catch( PDOException $e ){
	echo 'Error al conectarnos: ' . $e->getMessage();
}
?>