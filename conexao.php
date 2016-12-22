<?php
$dbhost ='localhost';
$dbuser ='root';
$dbpass='admin';
$conn = mysql_connect($dbhost,$dbuser,$dbpass)
	or die('Não foi possivel conectar');
$dbname='locadora';
mysql_select_db($dbname);
?>