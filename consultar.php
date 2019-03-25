<?php
header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        ob_end_flush();
include_once("conectar.php");
$id = $_REQUEST["id"];
#$sql = "select *from multa where id_placa='".$id."'";

$sql="select *
					from multa m
					inner join vehiculo v
					on v.id_placa = m.id_placa
					inner join propietarios p
					on p.id_cedulapro = v.id_cedulapro
					inner join usuarios u
					on u.id_propietario = p.id_cedulapro
					and v.id_placa = '".$id."'";


#$sql = "select *from multa ORDER by id_multa asc";
$result= mysqli_query($mysqli, $sql) or die ("No existen datos");
$rows = array();
while($r = mysqli_fetch_assoc($result)){
	$rows[]= $r;
};
print json_encode($rows);
?>

