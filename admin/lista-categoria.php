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
          <h1>Listado de Categorias de Eventos</h1>
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
                <h3 class="card-title">Maneja las categorias de los eventos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="registros" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Icono</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      try {
                        $sql = "SELECT * FROM categoria_evento";
                        $resultado = $conn->query($sql);
                      } catch (Exception $e) {
                        $error = $e->getMessage();
                      }
                      while ($categoria = $resultado->fetch_assoc() ) { ?>

                        <tr>
                          <td><?php echo $categoria['cat_evento']; ?></td>
                          <td><i class="fa <?php echo $categoria['icono']; ?>" ></i></td>
                          <td>
                            <a href="editar-categoria.php?id=<?php echo $categoria['id_categoria'] ?>" class="btn bg-orange btn-flat margin">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="#" data-id="<?php echo $categoria['id_categoria'] ?>" data-tipo="categoria" class="btn bg-maroon btn-flat margin borrar_registro">
                              <i class="fas fa-trash"></i>
                            </a>

                          </td>
                        </tr>
                      <?php }?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Nombre</th>
                      <th>Icono</th>
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
