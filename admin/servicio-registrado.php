<?php 
  include_once 'funciones/sesiones.php';
  include_once "funciones/funciones.php";

  $sql = "SELECT fecha_registro, COUNT(*) AS resultado FROM registrado GROUP BY DATE(fecha_registro) ORDER BY fecha_registro ";
  $resultado = $conn->query($sql);

  $arreglo_registro = array();

  while($registro_dia = $resultado->fetch_assoc()) {
    $fecha = $registro_dia['fecha_registro'];
    $registro['fecha'] = date('Y-m-d', strtotime($fecha));
    $registro['cantidad'] = $registro_dia['resultado'];

    $arreglo_registro[] = $registro;

  }

  echo json_encode($arreglo_registro);

?>