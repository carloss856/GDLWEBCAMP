<?php 
  include_once 'funciones/sesiones.php';
  include_once "funciones/funciones.php";
  include_once "templates/header.php";
  $id = $_GET['id'];
  if(!filter_var($id, FILTER_VALIDATE_INT)) {
    die("Error!!");
  }

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
            <h1>Editar Administradores</h1>
            <small>puedes editar los datos del administrador aqui</small>
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
              <h3 class="card-title">Editar administrador</h3>
            </div>
            <div class="card-body">
              <?php
                $sql = "SELECT * FROM admins WHERE id_admin = $id ";
                $resultado = $conn->query($sql);
                $admin = $resultado->fetch_assoc();
              ?>
              <!-- form start -->
              <form class="form-horizontal" name="guardar-registro" id="guardar-registro" method="post" action="modelo-admin.php">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="usuario" class="col-sm-4 col-form-label">Usuario:</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" value="<?php echo $admin['usuario'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nombre" class="col-sm-4 col-form-label">Nombre:</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu Nombre Completo" value="<?php echo $admin['nombre'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="password" class="col-sm-4 col-form-label">Password:</label>
                    <div class="col-sm-12">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Editar tu Contraseña">
                      <span id="resultado_password" class="help-block"></span>
                    </div>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="hidden" name="registro" value="actualizar">
                  <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                  <button type="submit" class="btn btn-info">Guardar</button>
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
