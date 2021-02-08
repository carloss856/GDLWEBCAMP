<?php 
  
  include_once 'funciones/sesiones.php';
  include_once 'funciones/funciones.php';
  include_once "templates/header.php";
  include_once "templates/barra.php";
  include_once "templates/aside.php";

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Listado de Registrados</h1>
          <small></small>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ML_A">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Maneja los Registrados</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="registros" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Fecha registro</th>
                      <th>Articulos</th>
                      <th>Talleres</th>
                      <th>Regalo</th>
                      <th>Compra</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      try {
                        $sql = "SELECT registrados.*, regalos.nombre_regalo FROM registrados";
                        $sql .= " JOIN regalos ";
                        $sql .= " ON registrados.regalo = regalos.id_regalo ";
                        $resultado = $conn->query($sql);
                      } catch (Exception $e) {
                        $error = $e->getMessage();
                      }
                      while ($registrado = $resultado->fetch_assoc() ) { ?>

                        <tr>
                          <td>
                            <?php echo $registrado['nombre_registrado'] . " " . $registrado['apellido_registrado']; 
                                  echo "<br>";
                                  $pagado = $registrado['pagado'];
                                  if($pagado) {
                                    echo '<span class="badge bg-green">Pagado</span>';
                                  } else {
                                    echo '<span class="badge bg-red">No Pagado</span>';
                                  }
                            ?>
                            
                          </td>
                          <td><?php echo $registrado['email_registrado']; ?></td>
                          <td><?php echo $registrado['fecha_registro']; ?></td>
                          <td>
                            <?php 
                              $articulos = json_decode($registrado['pases_articulos'], true);
                              $arreglo_articulos = array(
                                'un_dia' => 'Pase 1 dia',
                                'pase_2dias' => 'Pase 2 dias',
                                'pase_completo' => 'Pase Completo',
                                'camisas' => 'Camisas',
                                'etiquetas' => 'Etiquetas'
                              );

                              foreach($articulos as $llave => $articulo) {
                                if(array_key_exists('cantidad', $articulo)) {
                                  echo $articulo['cantidad'] . " " . $arreglo_articulos[$llave] . "<br>";
                                } else {
                                  echo $articulo . " " . $arreglo_articulos[$llave] . "<br>";
                                }
                              }
                            ?>
                          </td>
                          <td>
                            <?php 
                              $eventos_resultado = $registrado['talleres_registrados'];
                              $talleres = json_decode($eventos_resultado, true);

                              $talleres = implode("', '", $talleres['eventos']);
                              $sql_talleres = "SELECT nombre_evento, fecha_evento, hora_evento FROM eventos WHERE clave IN ('$talleres') OR evento_id IN ('$talleres') ";
                              $resultado_talleres = $conn->query($sql_talleres);

                              while ($eventos = $resultado_talleres->fetch_assoc()) {
                                echo $eventos['nombre_evento'] . " " . $eventos['fecha_evento'] . " " . $eventos['hora_evento'] . "<br>";
                              }
                              
                            ?>
                          </td>
                          <td><?php echo $registrado['nombre_regalo']; ?></td>
                          <td>$ <?php echo (float) $registrado['total_pagado']; ?></td>
                          <td>
                            <a href="editar-registrado.php?id=<?php echo $registrado['id_registrados']; ?>" class="btn bg-orange btn-flat margin">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="#" data-id="<?php echo $registrado['id_registrados']; ?>" data-tipo="registro" class="btn bg-maroon btn-flat margin borrar_registro">
                              <i class="fas fa-trash"></i>
                            </a>

                          </td>
                        </tr>
                      <?php }?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Fecha registro</th>
                      <th>Articulos</th>
                      <th>Talleres</th>
                      <th>Regalo</th>
                      <th>Compra</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 

  include_once "templates/footer.php";

?>
