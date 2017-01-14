<?php
$dbhost ='localhost';
$dbuser ='root';
$dbpass='admin';
$dbname='locadora';
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if($conn->connect_error){
	echo("Nao foi possivel conectar: (".$conn->connect_errno.") ".$conn->connect_error." ");
}

?>