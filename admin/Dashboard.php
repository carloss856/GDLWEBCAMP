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
            <h1>Dashboard</h1>
            <small>Informacion sobre el evento</small>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-6">
                <?php
                    $sql = "SELECT COUNT(id_registrados) AS registros FROM registrados ";
                    $resultado = $conn->query($sql);
                    $registrados = $resultado->fetch_assoc();
                ?>
                <!-- small card -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?php echo $registrados['registros']; ?></h3>

                        <p>Total Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Más Información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-6">
                <?php
                    $sql = "SELECT COUNT(id_registrados) AS registros FROM registrados WHERE pagado = 1 ";
                    $resultado = $conn->query($sql);
                    $registrados = $resultado->fetch_assoc();
                ?>
                <!-- small card -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?php echo $registrados['registros']; ?></h3>

                        <p>Total Pagados</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Más Información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-6">
                <?php
                    $sql = "SELECT COUNT(id_registrados) AS registros FROM registrados WHERE pagado = 0 ";
                    $resultado = $conn->query($sql);
                    $registrados = $resultado->fetch_assoc();
                ?>
                <!-- small card -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?php echo $registrados['registros']; ?></h3>

                        <p>Total Sin Pagar</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-times"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Más Información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-3 col-6">
                <?php
                    $sql = "SELECT SUM(total_pagado) AS ganancias FROM registrados WHERE pagado = 1 ";
                    $resultado = $conn->query($sql);
                    $registrados = $resultado->fetch_assoc();
                ?>
                <!-- small card -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>$<?php echo $registrados['ganancias']; ?></h3>

                        <p>Ganancias</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-usd"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Más Información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <h2 class="page-header">Regalos</h2>
        
        <div class="row">

            <div class="col-lg-4 col-6">
                <?php
                    $sql = "SELECT COUNT(total_pagado) AS pulseras FROM registrados WHERE pagado = 1 ";
                    $resultado = $conn->query($sql);
                    $regalo = $resultado->fetch_assoc();
                ?>
                <!-- small card -->
                <div class="small-box bg-indigo">
                    <div class="inner">
                        <h3><?php echo $regalo['pulseras']; ?></h3>

                        <p>Pulseras</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-gift"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Más Información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-4 col-6">
                <?php
                    $sql = "SELECT COUNT(total_pagado) AS etiquetas FROM registrados WHERE pagado = 2 ";
                    $resultado = $conn->query($sql);
                    $regalo = $resultado->fetch_assoc();
                ?>
                <!-- small card -->
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3><?php echo $regalo['etiquetas']; ?></h3>

                        <p>Etiquetas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-gift"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Más Información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
            
            <div class="col-lg-4 col-6">
                <?php
                    $sql = "SELECT COUNT(total_pagado) AS plumas FROM registrados WHERE pagado = 3 ";
                    $resultado = $conn->query($sql);
                    $regalo = $resultado->fetch_assoc();
                ?>
                <!-- small card -->
                <div class="small-box bg-pink">
                    <div class="inner">
                        <h3><?php echo $regalo['plumas']; ?></h3>

                        <p>Plumas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-gift"></i>
                    </div>
                    <a href="lista-registrados.php" class="small-box-footer">
                        Más Información <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        
        <div class="row">

            <!-- LINE CHART -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Line Chart</h3>
              </div>
              
              <div class="card-body">
                <div class="chart">
                  <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<?php 

  include_once "templates/footer.php";

?>
