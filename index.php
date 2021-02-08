<?php include_once 'includes/templates/header.php'; ?>

    <section class="seccion contenedor">
      <h2>La mejor conferencia de diseño web en español</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos accusantium sed maiores impedit, tempore at veritatis. Animi adipisci nisi sed consectetur iure, qui delectus voluptas officia inventore ut assumenda impedit!</p>
    </section><!--section-->

    <section class="programa">
      <div class="contenedor-video">
        <video autoplay loop poster="img/bg-talleres.jpg">
          <source src="video/video.mp4" type="video/mp4">
          <source src="video/video.webm" type="video/webm">
          <source src="video/video.ogv" type="video/ogg">
        </video>
      </div><!--contenedor-video-->

      <div class="contenido-programa">
        <div class="contenedor">
          <div class="programa-evento">
            <h2>Programa del Evento</h2>
            <?php 
                try {
                    require_once('includes/funciones/bd_conexion.php');
                    $sql = " SELECT * FROM categoria_evento ";
                    $resultado = $conn->query($sql);
                } catch (\Exception $e) {
                    $error = $e->getMessage();
                }
            ?>
            <nav class="menu-programa">
              <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                <?php $categoria = $cat['cat_evento']; ?>
                <?php $icono_evento = $cat['icono']; ?>
                <a href="#<?php echo strtolower($categoria); ?>"><i class="fa <?php echo $icono_evento; ?>"></i><?php echo $categoria; ?></a>
              <?php } ?>
            </nav>
            <?php 
                try {
                    require_once('includes/funciones/bd_conexion.php');
                    $sql = " SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `icono`, `nombre_invitado`, `apellido_invitado` ";
                    $sql .= "FROM `eventos` ";
                    $sql .= " INNER JOIN `categoria_evento` ";
                    $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                    $sql .= " INNER JOIN `invitados` ";
                    $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                    $sql .= "AND eventos.id_cat_evento = 1";
                    $sql .= " ORDER BY `evento_id` LIMIT 2 ;";
                    $sql .= " SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `icono`, `nombre_invitado`, `apellido_invitado` ";
                    $sql .= "FROM `eventos` ";
                    $sql .= " INNER JOIN `categoria_evento`";
                    $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                    $sql .= " INNER JOIN `invitados` ";
                    $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                    $sql .= "AND eventos.id_cat_evento = 2";
                    $sql .= " ORDER BY `evento_id` LIMIT 2;";
                    $sql .= " SELECT `evento_id`, `nombre_evento`, `fecha_evento`, `hora_evento`, `cat_evento`, `icono`, `nombre_invitado`, `apellido_invitado` ";
                    $sql .= "FROM `eventos` ";
                    $sql .= " INNER JOIN `categoria_evento` ";
                    $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                    $sql .= " INNER JOIN `invitados` ";
                    $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                    $sql .= "AND eventos.id_cat_evento = 3";
                    $sql .= " ORDER BY `evento_id` LIMIT 2;";
                } catch (\Exception $e) {
                    $error = $e->getMessage();
                }
            ?>
            <?php $conn->multi_query($sql); ?>
            <?php
              do {
                $resultado = $conn->store_result();
                $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>
                <?php $i = 0; ?>
                <?php foreach($row as $evento) { ?>
                  <?php if($i % 2 == 0) { ?>
                    <div id="<?php echo strtolower( $evento['cat_evento'] ); ?>" class="info-curso ocultar clearfix">
                  <?php } ?>
                    <div class="detalle-evento">
                      <h3><?php echo $evento['nombre_evento']; ?></h3>
                      <p><i class="fas fa-clock"></i><?php echo $evento['hora_evento']; ?></p>
                      <p><i class="fas fa-calendar-alt"></i><?php echo $evento['fecha_evento']; ?></p>
                      <p><i class="fas fa-user"></i><?php echo $evento['nombre_invitado'] . " " . $evento['apellido_invitado']; ?></p>
                    </div>

                    
                  <?php if($i % 2 == 1) { ?>
                    <a href="calendario.php" class="boton float-right">Ver Todos</a>
                    </div><!--talleres-->
                  <?php } ?>
                  <?php $i++; ?>
                <?php } ?>
                <?php $resultado->free(); ?>

              <?php } while ($conn->more_results() && $conn->next_result());

            ?>

          </div><!--programa evento-->
        </div><!--contenedor-->
      </div><!--contenido programa-->

    </section><!--programa-->

    <?php include_once 'includes/templates/invitados.php'; ?>

    <div class="contador parallax">
      <div class="contenedor">
        <ul class="resumen-evento clearfix">
          <li><p class="numero">0</p> Invitados</li>
          <li><p class="numero">0</p> Talleres</li>
          <li><p class="numero">0</p> Días</li>
          <li><p class="numero">0</p> Conferencias</li>
        </ul>
      </div>
    </div><!--contador-->

    <section class="precios seccion">
      <h2>Precios</h2>
      <div class="contenedor">
        <ul class="lista-precios clearfix">
          <li>
            <div class="tabla-precio">
              <h3>precio por día</h3>
              <p class="numero">$30</p>
              <ul>
                <li>Bocadillos Gratis</li>
                <li>Todas las conferencias</li>
                <li>Todos los talleres</li>
              </ul>
              <a href="#" class="boton hollow">Comprar</a>
            </div>
          </li>

          <li>
            <div class="tabla-precio">
              <h3>Todos los días</h3>
              <p class="numero">$50</p>
              <ul>
                <li>Bocadillos Gratis</li>
                <li>Todas las conferencias</li>
                <li>Todos los talleres</li>
              </ul>
              <a href="#" class="boton">Comprar</a>
            </div>
          </li>

          <li>
            <div class="tabla-precio">
              <h3>Precio por 2 día</h3>
              <p class="numero">$45</p>
              <ul>
                <li>Bocadillos Gratis</li>
                <li>Todas las conferencias</li>
                <li>Todos los talleres</li>
              </ul>
              <a href="#" class="boton hollow">Comprar</a>
            </div>
          </li>
        </ul><!--Lista-precios-->

      </div>
    </section><!--precios-->

    <div id="mapa" class="mapa"></div>

    <section class="seccion">
      <h2>Testimoniales</h2>
      <div class="testimoniales contenedor clearfix">
        <div class="testimonial">
          <blockquote>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt ducimus quibusdam soluta optio officiis, praesentium voluptas distinctio ex a sint, adipisci ipsum, quia doloribus ipsam libero atque nemo dolor dignissimos?</p>
            <footer class="info-testimonial clearfix">
              <img src="img/testimonial.jpg" alt="imagen testimonial">
              <cite>Sara Elisa Weky <span>Diseñador en @prisma</span></cite>
            </footer>
          </blockquote>
        </div><!--testimonial-->
        <div class="testimonial">
          <blockquote>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt ducimus quibusdam soluta optio officiis, praesentium voluptas distinctio ex a sint, adipisci ipsum, quia doloribus ipsam libero atque nemo dolor dignissimos?</p>
            <footer class="info-testimonial clearfix">
              <img src="img/testimonial.jpg" alt="imagen testimonial">
              <cite>Sara Elisa Weky <span>Diseñador en @prisma</span></cite>
            </footer>
          </blockquote>
        </div><!--testimonial-->
        <div class="testimonial">
          <blockquote>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt ducimus quibusdam soluta optio officiis, praesentium voluptas distinctio ex a sint, adipisci ipsum, quia doloribus ipsam libero atque nemo dolor dignissimos?</p>
            <footer class="info-testimonial clearfix">
              <img src="img/testimonial.jpg" alt="imagen testimonial">
              <cite>Sara Elisa Weky <span>Diseñador en @prisma</span></cite>
            </footer>
          </blockquote>
        </div><!--testimonial-->
      </div>
    </section><!--testimoniales-->

    <div class="newsletter parallax">
      <div class="contenido contenedor">
        <p>Regístrate al newsletters:</p>
        <h3>gdlwebcamp</h3>
        <a href="#mc_embed_signup" class="boton_newsletter boton transparente">Registro</a>
      </div><!--contenido-->
    </div><!--newsletter-->

    <section class="seccion">
      <h2>Faltan</h2>
      <div class="cuenta-regresiva contenedor">
        <ul class="clearfix">
          <li><p id="dias" class="numero"></p> Días</li>
          <li><p id="horas" class="numero"></p> Horas</li>
          <li><p id="minutos" class="numero"></p> Minutos</li>
          <li><p id="segundos" class="numero"></p> Segundos</li>
        </ul>
      </div><!--cuenta regrsiva-->
    </section><!--regresiva-->
<?php include_once 'includes/templates/footer.php'; ?>