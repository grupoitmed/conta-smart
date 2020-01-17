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
$json   = array();

// Query that retrieves events
if ($id > 0) {
  $requete = "SELECT idhorario AS inicio, fecha, idmedico, estado FROM medicos_horarios WHERE estado = 0 AND idmedico = $id ORDER BY fecha ASC";
}else {
  $requete = "SELECT idhorario AS inicio, fecha, idmedico, estado FROM medicos_horarios WHERE estado = 0 ORDER BY fecha ASC";
}

  $rs = mysql_query($requete);
  while ($row = mysql_fetch_assoc($rs)) {

    $e = array();

    $sqlHora = "SELECT * FROM horas WHERE Idhora = ".$row['inicio'];
    $resHora  = mysql_query($sqlHora);
    while ($row2 = mysql_fetch_array($resHora)) {
      $inicio          = $row2['hora'];
    }

    $hora = $row['inicio']+1;
    $sqlHora = "SELECT * FROM horas WHERE Idhora = ".$hora;
    $resHora  = mysql_query($sqlHora);
    while ($row2 = mysql_fetch_array($resHora)) {
      $fin          = $row2['hora'];
    }

    $sqlMedico = "SELECT * FROM medicos WHERE idmedico = ".$row['idmedico'];
    $resMedico  = mysql_query($sqlMedico);
    while ($row2 = mysql_fetch_array($resMedico)) {
      $title          = $row2['nombres'].' '.$row2['apellidos'].' - '.$row2['especialidad'];
      $backgroundColor          = $row2['backgroundColor'];
    }


    $start = $row['fecha'].' '.$inicio.':'.'00:00';
    $end = $row['fecha'].' '.$fin.':'.'00:00';



    $e['start']               = date('Y-m-d H:i:s', strtotime($start));
    $e['end']                 = date('Y-m-d H:i:s', strtotime($end));
    $e['title']                 = $title;
    $e['backgroundColor']     = $backgroundColor;

    array_push($json, $e);

  }
  echo json_encode($json);
?>
