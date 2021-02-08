<?php 
  $id = $_GET['id'];
  if(!filter_var($id, FILTER_VALIDATE_INT)) {
    die("Error!!");
  }
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
            <h1>Editar Categoria</h1>
            <small>Llena el formulario para editar la categoria</small>
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
              <h3 class="card-title">Editar categoria</h3>
            </div>
            <div class="card-body">
                <?php 
                    $sql = "SELECT * FROM categoria_evento WHERE id_categoria = $id ";
                    $resultado = $conn->query($sql);
                    $categoria = $resultado->fetch_assoc();
                
                ?>
              <!-- form start -->
              <form class="form-horizontal" name="guardar-registro" id="guardar-registro" method="post" action="modelo-categoria.php">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="nombre" class="col-sm-4 col-form-label">Nombre:</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" placeholder="Nombre de la categoria" value="<?php echo $categoria['cat_evento']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nombre" class="col-sm-4 col-form-label">Icono:</label>
                    <div class="input-group col-sm-12">
                      <input type="text" class="form-control pull-right" id="icono" name="icono" placeholder="Selecciona un icono" value="<?php echo $categoria['icono']; ?>">
                      <div class="input-group-append">
                          <div class="input-group-text"><i class="fa <?php echo $categoria['icono']; ?>"></i></div>
                      </div>
                    </div>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="hidden" name="registro" value="actualizar">
                  <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                  <button type="submit" class="btn btn-info" id="crear_registro">Guardar</button>
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
