<?php
include '../application/config/database.php';

$host     = $db['default']['hostname'];
$unicuser = $db['default']['username'];
$password = $db['default']['password'];
$bd_name  = $db['default']['database'];



$conexion = mysql_connect($host, $unicuser, $password) or die(mysql_error());
mysql_query("SET NAMES 'utf8'");
$bd = mysql_select_db($bd_name, $conexion) or die(mysql_error());
mysql_query("SET NAMES 'utf8'");

$id     = $_GET['idm'];
//$estado = $_GET['estado'];
$json   = array();

// Query that retrieves events
 if( $id == 3 || $id == 2 || $id == 6 ){
$requete = "SELECT * FROM reserva_citas WHERE status=0 OR status=1 OR status=2 ORDER BY fechahora ASC";
}
else{
$requete = "SELECT * FROM reserva_citas WHERE idmedico=".$id." and 8status=0 OR status=1 OR status=2) ORDER BY fechahora ASC";
}
 $rs=mysql_query($requete);
while ($row = mysql_fetch_assoc($rs)) {
    
    $e = array();
        $e['idreservacita'] = $row['idreservacita'];
        $e['title'] = $row['title'];
        $e['start'] = $row['start'];
        $e['end'] = $row['end'];
        $e['idme'] = $row['idmedico'];
        $e['idexp'] = $row['idexpediente'];
        $e['status'] = $row['status'];
        $smed = "SELECT nombre FROM usuarios WHERE idUsuario = '".$e['idme']."'";
        $med = mysql_query($smed);
        while($row2 = mysql_fetch_assoc($med)){
            $e['medico'] = $row2['nombre'];
        }
        $e['backgroundColor'] = $row['backgroundColor'];
        /*if($row['allDay']==1){$e['allDay'] = true;}
        else{$e['allDay'] = false;}*/
        
        // Merge the event array into the return array
        array_push($json, $e);

}
echo json_encode($json);
?>
