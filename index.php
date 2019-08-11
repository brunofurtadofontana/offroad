<?php
  session_start();
  //include("config/verifica.php"); //Verifica a sessão esta ativa
  include("config/conn.php"); //Importa conexão com banco de dados
  //$name = $_SESSION['LOGIN_USUARIO'];
  //$res = mysqli_query($con,"SELECT idUsuario, usuNome from usuario WHERE usuEmail = '$name' "); //Consulta se o email da SESSION é o mesmo do usuario que esta logado
  //$showID = mysqli_fetch_assoc($res);
  //$id = $showID['idUsuario']; //Pega o id do usuario logado
  //$nome = $showID['usuNome'];

?>
<!DOCTYPE html>

<html lang="en" class="default-style">

<head>
  <title>OFFROAD - TRILHAS - MOTOCROSS</title>

  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <link rel="icon" type="image/x-icon" href="favicon.ico">

  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">

  <!-- Icon fonts -->
  <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css">
  <link rel="stylesheet" href="assets/vendor/fonts/ionicons.css">
  <link rel="stylesheet" href="assets/vendor/fonts/linearicons.css">
  <link rel="stylesheet" href="assets/vendor/fonts/open-iconic.css">
  <link rel="stylesheet" href="assets/vendor/fonts/pe-icon-7-stroke.css">

  <!-- Core stylesheets -->
  <link rel="stylesheet" href="assets/vendor/css/rtl/bootstrap.css" class="theme-settings-bootstrap-css">
  <link rel="stylesheet" href="assets/vendor/css/rtl/appwork.css" class="theme-settings-appwork-css">
  <link rel="stylesheet" href="assets/vendor/css/rtl/theme-corporate.css" class="theme-settings-theme-css">
  <link rel="stylesheet" href="assets/vendor/css/rtl/colors.css" class="theme-settings-colors-css">
  <link rel="stylesheet" href="assets/vendor/css/rtl/uikit.css">
  <link rel="stylesheet" href="assets/css/demo.css">

  <!-- Load polyfills -->
  <script src="assets/vendor/js/polyfills.js"></script>
  <script>document['documentMode']===10&&document.write('<script src="https://polyfill.io/v3/polyfill.min.js?features=Intl.~locale.en"><\/script>')</script>

  <script src="assets/vendor/js/material-ripple.js"></script>
  <script src="assets/vendor/js/layout-helpers.js"></script>

  <!-- Theme settings -->
  <!-- This file MUST be included after core stylesheets and layout-helpers.js in the <head> section -->
  

  <!-- Core scripts -->
  <script src="assets/vendor/js/pace.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Libs -->
  <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">

</head>

<body>
  <div class="page-loader">
    <div class="bg-primary"></div>
  </div>

  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-2">
    <div class="layout-inner">

      <!-- Layout sidenav -->
    

      <!-- Layout container -->
      <div class="layout-container">
        <!-- Layout navbar -->
        <nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-white container-p-x" id="layout-navbar">

          <!-- Brand demo (see assets/css/demo/demo.css) -->
         <div class="app-brand demo">
          <span class="app-brand-logo demo bg-primary">
            <svg viewBox="0 0 148 80" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><linearGradient id="a" x1="46.49" x2="62.46" y1="53.39" y2="48.2" gradientUnits="userSpaceOnUse"><stop stop-opacity=".25" offset="0"></stop><stop stop-opacity=".1" offset=".3"></stop><stop stop-opacity="0" offset=".9"></stop></linearGradient><linearGradient id="e" x1="76.9" x2="92.64" y1="26.38" y2="31.49" xlink:href="#a"></linearGradient><linearGradient id="d" x1="107.12" x2="122.74" y1="53.41" y2="48.33" xlink:href="#a"></linearGradient></defs><path style="fill: #fff;" transform="translate(-.1)" d="M121.36,0,104.42,45.08,88.71,3.28A5.09,5.09,0,0,0,83.93,0H64.27A5.09,5.09,0,0,0,59.5,3.28L43.79,45.08,26.85,0H.1L29.43,76.74A5.09,5.09,0,0,0,34.19,80H53.39a5.09,5.09,0,0,0,4.77-3.26L74.1,35l16,41.74A5.09,5.09,0,0,0,94.82,80h18.95a5.09,5.09,0,0,0,4.76-3.24L148.1,0Z"></path><path transform="translate(-.1)" d="M52.19,22.73l-8.4,22.35L56.51,78.94a5,5,0,0,0,1.64-2.19l7.34-19.2Z" fill="url(#a)"></path><path transform="translate(-.1)" d="M95.73,22l-7-18.69a5,5,0,0,0-1.64-2.21L74.1,35l8.33,21.79Z" fill="url(#e)"></path><path transform="translate(-.1)" d="M112.73,23l-8.31,22.12,12.66,33.7a5,5,0,0,0,1.45-2l7.3-18.93Z" fill="url(#d)"></path></svg>
          </span>
          <a href="index.php" class="app-brand-text demo sidenav-text font-weight-bold ml-2">OffRoad</a>
          
        </div>

          <!-- Sidenav toggle (see assets/css/demo/demo.css) -->
          <div class="layout-sidenav-toggle navbar-nav d-lg-none align-items-lg-center mr-auto">
            
          </div>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#layout-navbar-collapse">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="navbar-collapse collapse" id="layout-navbar-collapse">
            <!-- Divider -->
            <hr class="d-lg-none w-100 my-2">

            <div class="navbar-nav align-items-lg-center">
              <!-- Search -->
              <label class="nav-item navbar-text navbar-search-box p-0 active">
                
                <span class="navbar-search-input pl-2">
                  
                </span>
              </label>
            </div>

            <div class="navbar-nav align-items-lg-center ml-auto">
              <div class="demo-navbar-messages nav-item dropdown mr-lg-3">
                <a class="nav-link dropdown-toggle hide-arrow" href="#" data-toggle="dropdown">
                  <i class="navbar-icon align-middle">Ajuda</i>
                  
                </a>
                
              </div>
              <!-- Divider -->
              <div class="nav-item d-none d-lg-block text-big font-weight-light line-height-1 opacity-25 mr-3 ml-1">|
              </div>
              
              <div class="demo-navbar-user nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                  <span class="d-inline-flex flex-lg-row-reverse align-items-center align-middle">
                    
                    <span class="px-1 mr-lg-2 ml-2 ml-lg-0">Entrar</span>
                  </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a href="logme.php" class="dropdown-item"><i class="ion ion-ios-person text-lightest"></i> &nbsp; Login</a>
                  <a href="register.php" class="dropdown-item"><i class="ion ion-md-person-add text-lightest"></i> &nbsp; Criar minha conta</a>
                  <div class="dropdown-divider"></div>
                </div>
              </div>
            </div>
          </div>
        </nav>
        <!-- / Layout navbar -->

        <!-- Layout content -->
        <div class="layout-content">

          <!-- Content -->
          <div class="container-fluid flex-grow-1 container-p-y">

          
          <!-- CAROUSEL -->  
           <div class="row"> 
               <div class="col-sm-6 col-xl-8">
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <?php 
                          $res = mysqli_query($con,"SELECT COUNT(*) AS total from evento ")or die(mysqli_error($con));
                          $sw = mysqli_fetch_assoc($res);
                          $qntEv = $sw['total'];

                          for ($i=0; $i < $qntEv; $i++) { 
                      ?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <?php
                          }
                      ?>
                      
                    </ol>
                    <div class="carousel-inner">
                      <?php 
                          $resEv = mysqli_query($con,"SELECT *from evento JOIN evento_img WHERE idEventos = Evento_idEventos ")or die(mysqli_error($con));
                          //$totalIt = mysqli_num_row($resEv);
                          $count = 0;
                          while($show = mysqli_fetch_assoc($resEv)){
                      ?>
                            <div class="carousel-item <?php if($count == 0 )echo 'active' ?>">
                                <img class="d-block w-100" style='width:500px;' src="uploads/<?php echo $show['eveImgNome'];?>" alt="<?php echo $show['evenNome']; ?>" title="<?php echo $show['evenNome']; ?>">
                            </div>
                      <?php
                            $count++;
                          }
                      ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Próximo</span>
                    </a>
                  </div>

              </div>
              <div class="col-sm-6 col-xl-4">
                  <div class="card mb-4">
                  <div class="w-100">
                    <a href="javascript:void(0)" class="card-img-top d-block ui-rect-60 ui-bg-cover" style="background-image: url('uploads/1.jpeg');">
                      <div class="d-flex justify-content-between align-items-end ui-rect-content p-3">
                        <div class="flex-shrink-1">
                          <span class="badge badge-primary">Java</span>
                        </div>
                        <div class="text-big">
                          <div class="badge badge-dark font-weight-bold">$15.99</div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div class="card-body">
                    <h5 class="mb-3"><a href="javascript:void(0)" class="text-body">Complete Java Masterclass</a></h5>
                    <p class="text-muted mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec odio ligula, rhoncus scelerisque ullamcorper iaculis.</p>
                    <div class="media">
                      <div class="media-body">
                        <div class="ui-stars">
                          <div class="ui-star filled">
                            <i class="ion ion-md-star"></i>
                            <i class="ion ion-md-star"></i>
                          </div>
                          <div class="ui-star filled">
                            <i class="ion ion-md-star"></i>
                            <i class="ion ion-md-star"></i>
                          </div>
                          <div class="ui-star filled">
                            <i class="ion ion-md-star"></i>
                            <i class="ion ion-md-star"></i>
                          </div>
                          <div class="ui-star filled">
                            <i class="ion ion-md-star"></i>
                            <i class="ion ion-md-star"></i>
                          </div>
                          <div class="ui-star half-filled">
                            <i class="ion ion-md-star"></i>
                            <i class="ion ion-md-star"></i>
                          </div>
                        </div>
                        <a href="javascript:void(0)" class="text-muted small">55</a>
                      </div>
                      <div class="text-muted small">
                        <i class="ion ion-md-time text-primary"></i>
                        <span>12h</span>
                      </div>
                    </div>
                  </div>
                </div>
                  
              </div>
            </div>
            



            <h4 class="d-flex flex-wrap justify-content-between align-items-center w-100 font-weight-bold pt-2 mb-4">
              <div class="col-12 col-md px-0 pb-2">Trilhas</div>
              <div class="col-12 col-md-3 px-0 pb-2">
                <input type="text" class="form-control" placeholder="Search...">
              </div>
            </h4>

            

            <div class="row">
               <?php 
                  $resEv = mysqli_query($con,"SELECT *from evento JOIN evento_img WHERE idEventos = Evento_idEventos ")or die(mysqli_error($con));
                  //$totalIt = mysqli_num_row($resEv);
                  $count = 0;
                  while($show = mysqli_fetch_assoc($resEv)){
                    $id = $show['idEventos'];
              ?>                     
                      <div class="col-sm-6 col-xl-4">
                        <div class="card mb-4">
                          <div class="w-100">
                            <a href="javascript:void(0)" class="card-img-top d-block ui-rect-60 ui-bg-cover" style="background-image: url('uploads/<?php echo $show['eveImgNome']?>');">
                              <div class="d-flex justify-content-between align-items-end ui-rect-content p-3">
                                <div class="flex-shrink-1">
                                  <span class="badge badge-primary"><?php echo $show['evenTipoTrilha'] ?></span>
                                </div>
                                <div class="text-big">
                                  <div class="badge badge-dark font-weight-bold">R$ <?php echo $show['evenVlrInscri'] ?>,00</div>
                                </div>
                              </div>
                            </a>
                          </div>
                          <div class="card-body">
                            <h5 class="mb-3"><a href="eventDetail.php?id=<?php echo $id ?>" class="text-body"><?php echo $show['evenNome'] ?></a></h5>
                            <p class="text-muted mb-3"><?php echo $show['evenDescr'] ?></p>
                            <div class="media">
                              <div class="media-body">
                                <div class="ui-stars">
                                  <div class="ui-star filled">
                                    <i class="ion ion-md-star"></i>
                                    <i class="ion ion-md-star"></i>
                                  </div>
                                  <div class="ui-star filled">
                                    <i class="ion ion-md-star"></i>
                                    <i class="ion ion-md-star"></i>
                                  </div>
                                  <div class="ui-star filled">
                                    <i class="ion ion-md-star"></i>
                                    <i class="ion ion-md-star"></i>
                                  </div>
                                  <div class="ui-star filled">
                                    <i class="ion ion-md-star"></i>
                                    <i class="ion ion-md-star"></i>
                                  </div>
                                  <div class="ui-star half-filled">
                                    <i class="ion ion-md-star"></i>
                                    <i class="ion ion-md-star"></i>
                                  </div>
                                </div>
                                <a href="javascript:void(0)" class="text-muted small">55</a>
                              </div>
                              <div class="text-muted small">
                                <i class="ion ion-md-time text-primary"></i>
                                <span>12h</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                <?php
                      $count++;
                  }
                ?>
             

            </div>

            <hr class="border-light mt-2 mb-4">

            <nav>
              <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                  <a class="page-link" href="javascript:void(0)">«</a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="javascript:void(0)">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0)">2</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0)">3</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0)">4</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0)">5</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="javascript:void(0)">»</a>
                </li>
              </ul>
            </nav>

          </div>
          <!-- / Content -->

          <!-- Layout footer -->
          <nav class="layout-footer footer bg-footer-theme">
            <div class="container-fluid d-flex flex-wrap justify-content-between text-center container-p-x pb-3">
              <div class="pt-3">
                <span class="footer-text font-weight-bolder">Appwork</span> ©
              </div>
              <div>
                <a href="javascript:void(0)" class="footer-link pt-3">About Us</a>
                <a href="javascript:void(0)" class="footer-link pt-3 ml-4">Help</a>
                <a href="javascript:void(0)" class="footer-link pt-3 ml-4">Contact</a>
                <a href="javascript:void(0)" class="footer-link pt-3 ml-4">Terms &amp; Conditions</a>
              </div>
            </div>
          </nav>
          <!-- / Layout footer -->

        </div>
        <!-- Layout content -->

      </div>
      <!-- / Layout container -->

    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-sidenav-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Core scripts -->
  <script src="assets/vendor/libs/popper/popper.js"></script>
  <script src="assets/vendor/js/bootstrap.js"></script>
  <script src="assets/vendor/js/sidenav.js"></script>

  <!-- Libs -->
  <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <!-- Demo -->
  <script src="assets/js/demo.js"></script>

</body>

</html>