<?php require ROOT_VIEW.'/template/header.php'; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- Cartilla 1: Total Comidas -->
          <div class="col-lg-3 col-6">
              <div class="small-box bg-info">
                  <div class="inner">
                      <h3>120</h3>
                      <p>Total Comidas</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-fork"></i>
                  </div>
                  <a href="#" class="small-box-footer">Ver Detalles <i class="fas fa-arrow-circle-right"></i></a>
              </div>
          </div>

          <!-- Cartilla 2: Popularidad -->
          <div class="col-lg-3 col-6">
              <div class="small-box bg-success">
                  <div class="inner">
                      <h3>80%</h3>
                      <p>Índice de Popularidad</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-star"></i>
                  </div>
                  <a href="#" class="small-box-footer">Ver Detalles <i class="fas fa-arrow-circle-right"></i></a>
              </div>
          </div>

          <!-- Cartilla 3: Ingresos -->
          <div class="col-lg-3 col-6">
              <div class="small-box bg-primary">
                  <div class="inner">
                      <h3>$15,000</h3>
                      <p>Ingresos Mensuales</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-cash"></i>
                  </div>
                  <a href="#" class="small-box-footer">Ver Detalles <i class="fas fa-arrow-circle-right"></i></a>
              </div>
          </div>

          <!-- Cartilla 4: Valoración Media -->
          <div class="col-lg-3 col-6">
              <div class="small-box bg-secondary">
                  <div class="inner">
                      <h3>4.5</h3>
                      <p>Valoración Media</p>
                  </div>
                  <div class="icon">
                      <i class="ion ion-android-star-outline"></i>
                  </div>
                  <a href="#" class="small-box-footer">Ver Detalles <i class="fas fa-arrow-circle-right"></i></a>
              </div>
          </div>
      </div>

        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
  <!-- Left col -->
  <section class="col-lg-7 connectedSortable">
    <!-- Custom tabs (Charts with tabs)-->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-chart-pie mr-1"></i>
          Ventas
        </h3>
        <div class="card-tools">
          <ul class="nav nav-pills ml-auto">
            <li class="nav-item">
              <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Área</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
            </li>
          </ul>
        </div>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content p-0">
          <!-- Gráfico de Morris - Ventas -->
          <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
            <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
          </div>
          <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
            <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
          </div>
        </div>
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- Chat Directo -->
    <div class="card direct-chat direct-chat-primary">
      <div class="card-header">
        <h3 class="card-title">Chat Directo</h3>
        <div class="card-tools">
          <span title="3 Nuevos Mensajes" class="badge badge-primary">3</span>
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" title="Contactos" data-widget="chat-pane-toggle">
            <i class="fas fa-comments"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <!-- Mensajes del chat directo -->
        <div class="direct-chat-messages">
          <!-- Mensaje - Izquierda por defecto -->
          <div class="direct-chat-msg">
            <div class="direct-chat-infos clearfix">
              <span class="direct-chat-name float-left">Alexander Pierce</span>
              <span class="direct-chat-timestamp float-right">23 Ene 2:00 pm</span>
            </div>
            <img class="direct-chat-img" src="<?php echo URL_RESOURCES."/lib/adminlte/"; ?>dist/img/user1-128x128.jpg" alt="Imagen del usuario del mensaje">
            <div class="direct-chat-text">
              ¿Este template es realmente gratuito? ¡Increíble!
            </div>
          </div>
          <!-- /.direct-chat-msg -->

          <!-- Mensaje - Derecha -->
          <div class="direct-chat-msg right">
            <div class="direct-chat-infos clearfix">
              <span class="direct-chat-name float-right">Sarah Bullock</span>
              <span class="direct-chat-timestamp float-left">23 Ene 2:05 pm</span>
            </div>
            <img class="direct-chat-img" src="<?php echo URL_RESOURCES."/lib/adminlte/"; ?>dist/img/user3-128x128.jpg" alt="Imagen del usuario del mensaje">
            <div class="direct-chat-text">
              ¡Claro que sí!
            </div>
          </div>
          <!-- /.direct-chat-msg -->

          <!-- Mensaje - Izquierda -->
          <div class="direct-chat-msg">
            <div class="direct-chat-infos clearfix">
              <span class="direct-chat-name float-left">Alexander Pierce</span>
              <span class="direct-chat-timestamp float-right">23 Ene 5:37 pm</span>
            </div>
            <img class="direct-chat-img" src="<?php echo URL_RESOURCES."/lib/adminlte/"; ?>dist/img/user1-128x128.jpg" alt="Imagen del usuario del mensaje">
            <div class="direct-chat-text">
              ¡Trabajando con AdminLTE en una nueva app genial! ¿Quieres unirte?
            </div>
          </div>
          <!-- /.direct-chat-msg -->

          <!-- Mensaje - Derecha -->
          <div class="direct-chat-msg right">
            <div class="direct-chat-infos clearfix">
              <span class="direct-chat-name float-right">Sarah Bullock</span>
              <span class="direct-chat-timestamp float-left">23 Ene 6:10 pm</span>
            </div>
            <img class="direct-chat-img" src="<?php echo URL_RESOURCES."/lib/adminlte/"; ?>dist/img/user3-128x128.jpg" alt="Imagen del usuario del mensaje">
            <div class="direct-chat-text">
              Me encantaría.
            </div>
          </div>
          <!-- /.direct-chat-msg -->

        </div>
        <!--/.direct-chat-messages-->

        <!-- Contactos cargados aquí -->
        <div class="direct-chat-contacts">
          <ul class="contacts-list">
            <li>
              <a href="#">
                <img class="contacts-list-img" src="<?php echo URL_RESOURCES."/lib/adminlte/"; ?>dist/img/user1-128x128.jpg" alt="Avatar del usuario">

                <div class="contacts-list-info">
                  <span class="contacts-list-name">
                    Conde Drácula
                    <small class="contacts-list-date float-right">28 Feb 2015</small>
                  </span>
                  <span class="contacts-list-msg">¿Cómo has estado? Yo estuve...</span>
                </div>
              </a>
            </li>
            <!-- Fin del elemento de contacto -->
            <li>
              <a href="#">
                <img class="contacts-list-img" src="<?php echo URL_RESOURCES."/lib/adminlte/"; ?>dist/img/user7-128x128.jpg" alt="Avatar del usuario">

                <div class="contacts-list-info">
                  <span class="contacts-list-name">
                    Sarah Doe
                    <small class="contacts-list-date float-right">23 Feb 2015</small>
                  </span>
                  <span class="contacts-list-msg">Estaré esperando por...</span>
                </div>
              </a>
            </li>
            <!-- Fin del elemento de contacto -->
            <li>
              <a href="#">
                <img class="contacts-list-img" src="<?php echo URL_RESOURCES."/lib/adminlte/"; ?>dist/img/user3-128x128.jpg" alt="Avatar del usuario">

                <div class="contacts-list-info">
                  <span class="contacts-list-name">
                    Nadia Jolie
                    <small class="contacts-list-date float-right">20 Feb 2015</small>
                  </span>
                  <span class="contacts-list-msg">Te llamaré de vuelta a...</span>
                </div>
              </a>
            </li>
            <!-- Fin del elemento de contacto -->
            <li>
              <a href="#">
                <img class="contacts-list-img" src="<?php echo URL_RESOURCES."/lib/adminlte/"; ?>dist/img/user5-128x128.jpg" alt="Avatar del usuario">

                <div class="contacts-list-info">
                  <span class="contacts-list-name">
                    Nora S. Vans
                    <small class="contacts-list-date float-right">10 Feb 2015</small>
                  </span>
                  <span class="contacts-list-msg">¿Dónde está tu nuevo...</span>
                </div>
              </a>
            </li>
            <!-- Fin del elemento de contacto -->
            <li>
              <a href="#">
                <img class="contacts-list-img" src="<?php echo URL_RESOURCES."/lib/adminlte/"; ?>dist/img/user6-128x128.jpg" alt="Avatar del usuario">

                <div class="contacts-list-info">
                  <span class="contacts-list-name">
                    John K.
                    <small class="contacts-list-date float-right">27 Ene 2015</small>
                  </span>
                  <span class="contacts-list-msg">¿Puedo echar un vistazo a...</span>
                </div>
              </a>
            </li>
            <!-- Fin del elemento de contacto -->
            <li>
              <a href="#">
                <img class="contacts-list-img" src="<?php echo URL_RESOURCES."/lib/adminlte/"; ?>dist/img/user8-128x128.jpg" alt="Avatar del usuario">

                <div class="contacts-list-info">
                  <span class="contacts-list-name">
                    Kenneth M.
                    <small class="contacts-list-date float-right">4 Ene 2015</small>
                  </span>
                  <span class="contacts-list-msg">No te preocupes, encontré...</span>
                </div>
              </a>
            </li>
            <!-- Fin del elemento de contacto -->
          </ul>
          <!-- /.contacts-list -->
        </div>
        <!-- /.direct-chat-pane -->
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <form action="#" method="post">
          <div class="input-group">
            <input type="text" name="message" placeholder="Escriba su mensaje ..." class="form-control">
            <span class="input-group-append">
              <button type="button" class="btn btn-primary">Enviar</button>
            </span>
          </div>
        </form>
      </div>
      <!-- /.card-footer-->
    </div>
    <!--/.direct-chat -->

  </section>
  <!-- /.Left col -->
  <!-- Right col -->
  <section class="col-lg-5 connectedSortable">

    <!-- Productos Nuevos y Venta -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Productos Nuevos y Venta</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-md-12 col-lg-12 order-1 order-md-2">
            <h3 class="text-primary"><i class="fas fa-file-alt"></i> Comida Tradicional</h3>
            <p class="text-muted">Al 40% de tus usuarios les gusta una gran comida en un país.
              <span class="float-right text-muted">A 80% de los visitantes.</span>
              </p>
            <div class="progress progress-sm">
              <div class="progress-bar bg-primary" style="width: 40%"></div>
            </div>
            <h3 class="text-success"><i class="fas fa-utensils"></i> Comida en Mexico</h3>
            <p class="text-muted">¡Descubre la auténtica cocina Mexico! Aproximadamente el 80% de los visitantes disfrutan de las especialidades locales.</p>
            <div class="progress progress-sm">
              <div class="progress-bar bg-success" style="width: 80%"></div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- Actividades recientes -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Actividades Recientes</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="timeline">
          <!-- timeline item -->
          <div>
            <i class="fas fa-envelope bg-primary"></i>

            <div class="timeline-item">
              <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span>
              <h3 class="timeline-header"><a href="#">Nuevo mensaje de Sarah Bullock</a></h3>

              <div class="timeline-body">
                Me encantaría.
              </div>
            </div>
          </div>
          <!-- END timeline item -->
          <!-- timeline item -->
          <div>
            <i class="fas fa-user bg-info"></i>

            <div class="timeline-item">
              <span class="time"><i class="fas fa-clock"></i> 15 mins ago</span>
              <h3 class="timeline-header no-border"><a href="#">Sarah Doe</a> se ha registrado en tu sistema</h3>
            </div>
          </div>
          <!-- END timeline item -->
          <!-- timeline item -->
          <div>
            <i class="fas fa-comments bg-warning"></i>

            <div class="timeline-item">
              <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
              <h3 class="timeline-header"><a href="#">Chat directo activo</a></h3>
            </div>
          </div>
          <!-- END timeline item -->
          <!-- timeline time label -->
          <div class="time-label">
            <span class="bg-success">
              10 Feb. 2014
            </span>
          </div>
          <!-- /.timeline-label -->
          <!-- timeline item -->
          <div>
            <i class="fas fa-camera bg-purple"></i>

            <div class="timeline-item">
              <span class="time"><i class="fas fa-clock"></i> 2 days ago</span>
              <h3 class="timeline-header"><a href="#">Subida de fotos</a></h3>

              <div class="timeline-body">
                <img src="<?php echo URL_RESOURCES."/lib/adminlte/"; ?>dist/img/sample1.jpg" alt="Foto subida" class="margin">
                <img src="<?php echo URL_RESOURCES."/lib/adminlte/"; ?>dist/img/sample2.jpg" alt="Foto subida" class="margin">
                <img src="<?php echo URL_RESOURCES."/lib/adminlte/"; ?>dist/img/sample3.jpg" alt="Foto subida" class="margin">
                <img src="<?php echo URL_RESOURCES."/lib/adminlte/"; ?>dist/img/sample4.jpg" alt="Foto subida" class="margin">
              </div>
            </div>
          </div>
          <!-- END timeline item -->
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.Right col -->
</div>
<!-- /.row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<?php require ROOT_VIEW.'/template/footer.php'; ?>