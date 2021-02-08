<?php 
  include_once 'funciones/sesiones.php';
  include_once "funciones/funciones.php";
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
            <h1>Crear Eventos</h1>
            <small></small>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Llena el formulario para crear un Evento</h3>
            </div>
            <div class="card-body">
              <!-- form start -->
              <form class="form-horizontal" name="guardar-registro" id="guardar-registro" method="post" action="modelo-evento.php">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="titulo_evento" class="col-sm-4 col-form-label">Titulo evento:</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="titulo_evento" name="titulo_evento" placeholder="Titulo Evento">
                    </div>
                  </div>
                  <!-- categoria -->
                <div class="form-group row">
                  <label for="password" class="col-sm-4 col-form-label">Categoria:</label>
                  <div class="col-sm-12">
                    <select name="categoria_evento" class="form-control select2" >
                        <option value="0">- Seleccione -</option>
                        <?php
                        
                          try {
                            $sql = "SELECT * FROM categoria_evento ";
                            $resultado = $conn->query($sql);
                            while ($cat_evento = $resultado->fetch_assoc()) {?>
                                <option value="<?php echo $cat_evento['id_categoria']; ?>">
                                  <?php echo $cat_evento['cat_evento']; ?>
                                </option>
                            <?php }
                          } catch (Exception $e) {
                            echo "Error" . $e->getMessage();
                          }
                        
                        ?>
                    </select>
                  </div>
                </div>
                <!--fin categoria -->

                <!-- Date -->
                <div class="form-group">
                  <label>Fecha Evento:</label>
                  <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker4" name="fecha_evento"/>
                      <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                      </div>
                  </div>
                </div>
                
                <!-- time Picker -->
                <div class="bootstrap-timepicker">
                  <div class="form-group">
                    <label>Hora:</label>
                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" data-target="#timepicker" name="hora_evento"/>
                      <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="far fa-clock"></i></div>
                      </div>
                      </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                </div>
                <div class="form-group row">
                  <label for="password" class="col-sm-4 col-form-label">Invitado o Ponente:</label>
                  <div class="col-sm-12">
                    <select name="invitado" class="form-control select2" >
                        <option value="0">- Seleccione -</option>
                        <?php
                        
                          try {
                            $sql = "SELECT invitado_id, nombre_invitado, apellido_invitado FROM invitados ";
                            $resultado = $conn->query($sql);
                            while ($invitados = $resultado->fetch_assoc()) {?>
                                <option value="<?php echo $invitados['invitado_id']; ?>">
                                  <?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado']; ?>
                                </option>
                            <?php }
                          } catch (Exception $e) {
                            echo "Error" . $e->getMessage();
                          }
                        
                        ?>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="hidden" name="registro" value="nuevo">
                  <button type="submit" class="btn btn-info">Añadir</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php 

  include_once "templates/footer.php";

?>

