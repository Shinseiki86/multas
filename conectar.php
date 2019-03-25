<?php
$databasehost = '127.0.0.1';
$databasename = 'db_multas';
$databaseuser = 'openshift';
$databasepass = 'OpenShift.2596';

$mysqli = mysqli_connect($databasehost, $databaseuser, $databasepass, $databasename);
if (!$mysqli){
	die("problemas de conexión PHP");
}
?>
