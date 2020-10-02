<?php
  //Carga de Datos
  if (empty(session('filtros')))
    $CarS = session('datos');
  else {
    $CarS = session('filtros');
    session()->forget('filtros');
  }
    $marcas = session('marcas');
    $modelos = session('modelos');
    $tipos = session('tipos');
    $years = session('years');

    $elementos_en_Cars = count($CarS);
  //Fin Carga de Datos
?>
<!doctype html>
<html lang="en">
<head>
  <title>Prueba Técnica Guillermo Valles Godoy</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- Multiselect css -->
  <link href="public/assets/plugins/bootstrap-multiselect/bootstrap-multiselect.css" rel="stylesheet" type="text/css" />

  <!-- App css -->
  <link href="public/assets/css/bootstrap-custom.min.css" rel="stylesheet" type="text/css" />
  <link href="public/assets/css/app.min.css" rel="stylesheet" type="text/css" />

  <link href="public/css/bootstrap.min.css" rel="stylesheet">
  <link href="public/css/font-awesome.min.css" rel="stylesheet">
  <link href="public/css/animate.min.css" rel="stylesheet">
  <link href="public/css/owl.carousel.css" rel="stylesheet">
  <link href="public/css/owl.transitions.css" rel="stylesheet">
  <link href="public/css/prettyPhoto.css" rel="stylesheet">  
  <link href="public/css/magnific-popup.css" rel="stylesheet">  
  <link href="public/css/gallery-1.css" rel="stylesheet">
  <link href="public/css/styles.css" rel="stylesheet"> 

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <!-- Favicon -->
  <link rel="shortcut icon" href="">

  <style>
    .flex-vertical-demo {
        height: 20rem;
        background-color: #fafafa;
    }

    .navbar {
      padding-top: 0;
      padding-bottom: 0;
      background: #0bc3c3;
      background: -webkit-gradient(linear,left top,right top,from(#0bc3c3),to(#009cff));
      background: linear-gradient(to right,#202b2b 0,#40f 100%);
    }
  </style>
</head>
<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand fixed-top">
    <div class="navbar-header">
      <div class="collapse navbar-collapse navbar-right">
        <ul class="nav navbar-nav">                        
        </ul>
      </div>
    </div>
  </nav>
  <!-- END NAVBAR -->

    <!-- MAIN -->
    <div class="main">
      <!-- MAIN CONTENT -->
      <div class="main-content">
        <br>
        <div id="wrapper">
          <div class="container-fluid">
            <div class="card">
              <h3 class="card-header">Filtrar Por: </h3>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Marca</label>
                      <select id="multiselect1" name="marcas[]" class="multiselect form-control" multiple="multiple">
                        <?php for($i=0; $i<count($marcas); $i++) { ?>
                          <option value="<?php echo $marcas[$i]; ?>"><?php echo $marcas[$i]; ?></option>
                        <?php } ?>
                      </select><br><br>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Modelo</label>
                      <select id="multiselect1" name="modelos[]" class="multiselect form-control" multiple="multiple">
                        <?php for($i=0; $i<count($modelos); $i++) { ?>
                          <option value="<?php echo $modelos[$i]; ?>"><?php echo $modelos[$i]; ?></option>
                        <?php } ?>
                      </select><br><br>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Tipo</label>
                      <select id="multiselect1" name="tipos[]" class="multiselect form-control" multiple="multiple">
                        <?php for($i=0; $i<count($tipos); $i++) { ?>
                          <option value="<?php echo $tipos[$i]; ?>"><?php echo $tipos[$i]; ?></option>
                        <?php } ?>
                      </select><br><br>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Año</label>
                      <select id="multiselect1" name="years[]" class="multiselect form-control" multiple="multiple">
                        <?php for($i=0; $i<count($years); $i++) { ?>
                          <option value="<?php echo $years[$i]; ?>"><?php echo $years[$i]; ?></option>
                        <?php } ?>
                      </select><br><br>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <button id='bn' class="btn btn-primary" type="button">Filtrar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="container-fluid">
          <div class="card">
            <h3 class="card-header">Vehiculos</h3>
                <?php for($i=0; $i<$elementos_en_Cars; ++$i) 
                {
                  echo'<div id="isotope-gallery-container">';
                  echo'<div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper artwork creative">';
                    echo'<div class="gallery-item">';
                      echo'<div class="gallery-thumb">';
                        if($i==0 || $i==1)
                          $identificador = '1st';
                        if($i==2)
                          $identificador = $i.'nd';
                        if($i==3)
                          $identificador = $i.'rd';
                        if($i>3)
                          $identificador = $i.'th';
                        echo'<img src="'.$CarS[$i]['img'].'" class="img-responsive" alt="'.$identificador.' gallery Thumb">';
                        echo'<div class="image-overlay"></div>';
                        echo'<a href="'.$CarS[$i]['img'].'" class="gallery-zoom"><i class="fa fa-eye"></i></a>';
                        echo'</div>';
                        echo'<div class="gallery-details">';
                        echo'<div class="editContent">';
                        echo'<h5>Detalles: </h5>';
                        echo'</div>';
                        echo'<div class="editContent">';
                        echo'<p>Marca: '.$CarS[$i]['brand'].' ';
                        echo'Model: '.$CarS[$i]['model'].' ';
                        echo'Año: '.$CarS[$i]['year'].' ';
                        echo'Tipo: '.$CarS[$i]['typeVehicle'].'</p>';
                        echo'</div>';
                        echo'</div>';
                        echo'</div>';
                        echo'</div>';
                } ?>
            </div>
          </div>
        </div>
      </div>
      <!-- END MAIN CONTENT -->

    </div>
    <!-- END MAIN -->

    <div class="clearfix"></div>

    <!-- footer -->
    <footer>
      <div class="container-fluid">
        <p class="copyright">&copy; 2020. Guillermo Valles Godoy.</p>
      </div>
    </footer>
    <!-- end footer -->

    <script>
      var filtros = [];
      $("#bn").click(function(){
          $("select[name='marcas[]'] option:selected" ).each(function() {
                  filtros.push($(this).val());
          });
          $("select[name='modelos[]'] option:selected" ).each(function() {
                  filtros.push($(this).val());
          });
          $("select[name='tipos[]'] option:selected" ).each(function() {
                  filtros.push($(this).val());
          });
          $("select[name='years[]'] option:selected" ).each(function() {
                  filtros.push($(this).val());
          });
          if(filtros.length>0)
          {
            $.ajax({
              url: "buscar",
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: {
                  "filtros": filtros
              },
              cache: false,
              type: "POST",
              beforeSend: function(){
                Swal.fire({
                  position: 'center',
                  icon: 'info',
                  title: 'Cargando Datos...',
                  timerProgressBar: true,
                  showConfirmButton: false,
                  timer: 1500
                })
              },
              success: function(response) {
                location.reload();
              }
            });
          }
          else
          {
            location.reload();
          }
      });
      $( document ).ready(function() {
        filtros = [];
        $("select[name='marcas[]']").multiselect("clearSelection");
        $("select[name='marcas[]']").multiselect( 'refresh' );
        $("select[name='modelos[]']").multiselect("clearSelection");
        $("select[name='modelos[]']").multiselect( 'refresh' );
        $("select[name='tipos[]']").multiselect("clearSelection");
        $("select[name='tipos[]']").multiselect( 'refresh' );
        $("select[name='years[]']").multiselect("clearSelection");
        $("select[name='years[]']").multiselect( 'refresh' );
      });



  </script>

  <!-- Vendor -->
  <script src="public/assets/js/vendor.min.js"></script>

  <!-- Multiselect Plugin -->
  <script src="public/assets/plugins/bootstrap-multiselect/bootstrap-multiselect.min.js"></script>

  <!-- Multiselect Init -->
  <script src="public/assets/js/pages/forms-multiselect.init.min.js"></script>

  <!-- Sweet Alerts Plugin -->
  <script src="public/assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>

  <!-- Sweet Alerts Init -->
  <script src="public/assets/js/pages/sweetalert2.init.min.js"></script>

  <script src="public/js/owl.carousel.min.js"></script>
  <script src="public/js/mousescroll.js"></script>
  <script src="public/js/smoothscroll.js"></script>
  <script src="public/js/jquery.prettyPhoto.js"></script> 
  <script src="public/js/jquery.inview.min.js"></script>
  <script src="public/js/wow.min.js"></script>
 
  <script type="text/javascript" src="public/js/jquery.isotope.min.js"></script><!-- Gallery Filter -->
	<script type="text/javascript" src="public/js/jquery.magnific-popup.min.js"></script><!-- Gallery Popup -->
	 

  <!-- App -->
  <script src="public/assets/js/app.min.js"></script>
</body>
</html>
