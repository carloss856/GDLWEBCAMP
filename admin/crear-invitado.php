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
            <h1>Crear invitado</h1>
            <small>Llena el formulario para añadir un invitado</small>
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
              <h3 class="card-title">Crear invitado</h3>
            </div>
            <div class="card-body">
              <!-- form start -->
              <form class="form-horizontal" name="guardar-registro" id="guardar-registro-archivo" method="post" action="modelo-invitado.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="nombre_invitado" class="col-sm-4 col-form-label">Nombre:</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="nombre_invitado" name="nombre_invitado" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="apellido_invitado" class="col-sm-4 col-form-label">Apellido:</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="apellido_invitado" name="apellido_invitado" placeholder="Apellido">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="biografia_invitado" class="col-sm-4 col-form-label">Biografia:</label>
                    <div class="col-sm-12">
                      <textarea class="form-control" id="biografia_invitado" name="biografia_invitado" placeholder="Biografia"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="imagen_invitado">Imagen:</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="imagen_invitado" name="archivo_imagen">
                        <label class="custom-file-label" for="imagen_invitado">Elige la imagen</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="imagen_invitado">Cargar</span>
                      </div>
                    </div>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="hidden" name="registro" value="nuevo">
                  <button type="submit" class="btn btn-info" id="crear_registro">Añadir</button>
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
