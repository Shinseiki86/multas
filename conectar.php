<?php
$databasehost = 'mysql';
$databasename = 'db_multas';
$databaseuser = 'root';
$databasepass = 'OpenShift.2596';

$mysqli = mysqli_connect($databasehost, $databaseuser, $databasepass, $databasename);
if (!$mysqli){
	die("problemas de conexión PHP");
}
?>
