<?php
  session_start();
  include("config/verifica.php"); //Verifica a sessão esta ativa
  include("config/conn.php"); //Importa conexão com banco de dados
  $name = $_SESSION['LOGIN_USUARIO'];
  $res = mysqli_query($con,"SELECT idUsuario, usuNome from usuario WHERE usuEmail = '$name' "); //Consulta se o email da SESSION é o mesmo do usuario que esta logado
  $showID = mysqli_fetch_assoc($res);
  $id = $showID['idUsuario']; //Pega o id do usuario logado
  $nome = $showID['usuNome'];

?>
<!DOCTYPE html>

<html lang="en" class="default-style">

<head>
  <title>Inicial</title>

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
  <script src="assets/vendor/js/theme-settings.js"></script>
  <script>
    window.themeSettings = new ThemeSettings({
      cssPath: 'assets/vendor/css/rtl/',
      themesPath: 'assets/vendor/css/rtl/'
    });
  </script>

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
      <div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-dark">

        <!-- Brand demo (see assets/css/demo/demo.css) -->
        <div class="app-brand demo">
          <span class="app-brand-logo demo bg-primary">
            <svg viewBox="0 0 148 80" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><linearGradient id="a" x1="46.49" x2="62.46" y1="53.39" y2="48.2" gradientUnits="userSpaceOnUse"><stop stop-opacity=".25" offset="0"></stop><stop stop-opacity=".1" offset=".3"></stop><stop stop-opacity="0" offset=".9"></stop></linearGradient><linearGradient id="e" x1="76.9" x2="92.64" y1="26.38" y2="31.49" xlink:href="#a"></linearGradient><linearGradient id="d" x1="107.12" x2="122.74" y1="53.41" y2="48.33" xlink:href="#a"></linearGradient></defs><path style="fill: #fff;" transform="translate(-.1)" d="M121.36,0,104.42,45.08,88.71,3.28A5.09,5.09,0,0,0,83.93,0H64.27A5.09,5.09,0,0,0,59.5,3.28L43.79,45.08,26.85,0H.1L29.43,76.74A5.09,5.09,0,0,0,34.19,80H53.39a5.09,5.09,0,0,0,4.77-3.26L74.1,35l16,41.74A5.09,5.09,0,0,0,94.82,80h18.95a5.09,5.09,0,0,0,4.76-3.24L148.1,0Z"></path><path transform="translate(-.1)" d="M52.19,22.73l-8.4,22.35L56.51,78.94a5,5,0,0,0,1.64-2.19l7.34-19.2Z" fill="url(#a)"></path><path transform="translate(-.1)" d="M95.73,22l-7-18.69a5,5,0,0,0-1.64-2.21L74.1,35l8.33,21.79Z" fill="url(#e)"></path><path transform="translate(-.1)" d="M112.73,23l-8.31,22.12,12.66,33.7a5,5,0,0,0,1.45-2l7.3-18.93Z" fill="url(#d)"></path></svg>
          </span>
          <a href="index.html" class="app-brand-text demo sidenav-text font-weight-normal ml-2">OffRoad</a>
          <a href="javascript:void(0)" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
            <i class="ion ion-md-menu align-middle"></i>
          </a>
        </div>

        <div class="sidenav-divider mt-0"></div>

       <ul class="sidenav-inner py-1">

          <!-- Resumo -->
          <li class="sidenav-item open active">
            <a href="../homeAdmin.php" class="sidenav-link"><i class="sidenav-icon ion ion-md-speedometer"></i>
              <div>Resumo</div>
            </a>
          </li>

          <!-- Meus Eventos -->
          <li class="sidenav-item">
            <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-md-calendar"></i>
              <div>Meus Eventos</div>
            </a>

            <ul class="sidenav-menu">
              <li class="sidenav-item open active">
                <a href="pages/eventos.php" class="sidenav-link">
                  <div>Eventos</div>
                </a>
              </li>
              <!-- <li class="sidenav-item">
                <a href="encerrados.php" class="sidenav-link">
                  <div>Eventos Encerrados</div>
                </a>
              </li> -->
              <li class="sidenav-item">
                <a href="pages/financeiro.php" class="sidenav-link">
                  <div>Finaceiro</div>
                </a>
              </li>
              <li class="sidenav-item">
                <a href="pages/checkin.php" class="sidenav-link">
                  <div>Check-in</div>
                </a>
              </li>
            </ul>
          </li>
          <!-- Minhas Trilhas -->
          <li class="sidenav-item">
            <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-ios-speedometer"></i>
              <div>Minhas Trilhas</div>
            </a>

            <ul class="sidenav-menu">
              <li class="sidenav-item">
                <a href="pages/minhascompras.php" class="sidenav-link">
                  <div>Minhas Compras</div>
                </a>
            </ul>
          </li>
          <!--Autorizações-->
          <?php
            $qr_tipoUser = mysqli_query($con,"SELECT usuPrivilegio FROM usuario WHERE idUsuario = '$id'")or die(mysqli_error($con));
                  $showUsu = mysqli_fetch_assoc($qr_tipoUser);
                  $priv = $showUsu['usuPrivilegio'];
                  $privBD = 'ADMIN';

                if (strcasecmp($priv,$privBD)==0) {
          ?>
          <li class="sidenav-item">
            <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-md-done-all"></i>
              <div>Autorizações</div>
            </a>

            <ul class="sidenav-menu">
              <li class="sidenav-item">
                <a href="pages/solicitacoes.php" class="sidenav-link">Solicitações
                   <div class="pl-1 ml-auto">
                </div>
                </a>
              </li>
              <!-- li class="sidenav-item">
                <a href="pages/ajuda.php" class="sidenav-link">
                  <div> </div>
                </a>
              </li>
              <li class="sidenav-item">
                <a href="forms_custom-controls.html" class="sidenav-link">
                  <div>Sair</div>
                </a>
              </li> -->
            </ul>
          </li>
          <?php
            }
          ?>
          <!-- Respostas -->
          <li class="sidenav-item">
            <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-ios-chatbubbles"></i>
              <div>Alterações</div>
            </a>

            <ul class="sidenav-menu">
              <li class="sidenav-item">
                <a href="pages/resposta.php" class="sidenav-link">
                  <div>Respostas</div>
                </a>
              </li>
            </ul>
          </li>
          <!-- fim resposta -->

          <!-- Configurações -->
          <li class="sidenav-item">
            <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-md-settings"></i>
              <div>Configurações</div>
            </a>

            <ul class="sidenav-menu">
              <li class="sidenav-item">
                <a href="pages/editperfil.php" class="sidenav-link">
                  <div>Editar Perfil</div>
                </a>
              </li>
          <?php

            if (strcasecmp($priv,$privBD)==0) {
          ?>
            <li class="sidenav-item">
                <a href="#" class="sidenav-link">
                  <div>Criar Usuario</div>
                </a>
              </li>
          <?php
          }
          ?>
              <li class="sidenav-item">
                <a href="pages/ajuda.php" class="sidenav-link">
                  <div>Ajuda</div>
                </a>
              </li>
              <li class="sidenav-item">

                <a href="forms_custom-controls.html" class="sidenav-link">
                  <div>Sair</div>
                </a>
              </li>
            </ul>
          </li>
          </ul>
          </li>
        </ul>
      </div>
      <!-- / Layout sidenav -->

      <!-- Layout container -->
      <div class="layout-container">
        <!-- Layout navbar -->
        <nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-white container-p-x" id="layout-navbar">

          <!-- Brand demo (see assets/css/demo/demo.css) -->
          <a href="index.html" class="navbar-brand app-brand demo d-lg-none py-0 mr-4">
            <span class="app-brand-logo demo bg-primary">
              <svg viewBox="0 0 148 80" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><linearGradient id="a" x1="46.49" x2="62.46" y1="53.39" y2="48.2" gradientUnits="userSpaceOnUse"><stop stop-opacity=".25" offset="0"></stop><stop stop-opacity=".1" offset=".3"></stop><stop stop-opacity="0" offset=".9"></stop></linearGradient><linearGradient id="e" x1="76.9" x2="92.64" y1="26.38" y2="31.49" xlink:href="#a"></linearGradient><linearGradient id="d" x1="107.12" x2="122.74" y1="53.41" y2="48.33" xlink:href="#a"></linearGradient></defs><path style="fill: #fff;" transform="translate(-.1)" d="M121.36,0,104.42,45.08,88.71,3.28A5.09,5.09,0,0,0,83.93,0H64.27A5.09,5.09,0,0,0,59.5,3.28L43.79,45.08,26.85,0H.1L29.43,76.74A5.09,5.09,0,0,0,34.19,80H53.39a5.09,5.09,0,0,0,4.77-3.26L74.1,35l16,41.74A5.09,5.09,0,0,0,94.82,80h18.95a5.09,5.09,0,0,0,4.76-3.24L148.1,0Z"></path><path transform="translate(-.1)" d="M52.19,22.73l-8.4,22.35L56.51,78.94a5,5,0,0,0,1.64-2.19l7.34-19.2Z" fill="url(#a)"></path><path transform="translate(-.1)" d="M95.73,22l-7-18.69a5,5,0,0,0-1.64-2.21L74.1,35l8.33,21.79Z" fill="url(#e)"></path><path transform="translate(-.1)" d="M112.73,23l-8.31,22.12,12.66,33.7a5,5,0,0,0,1.45-2l7.3-18.93Z" fill="url(#d)"></path></svg>
            </span>
            <span class="app-brand-text demo font-weight-normal ml-2">OffRoad</span>
          </a>

          <!-- Sidenav toggle (see assets/css/demo/demo.css) -->
          <div class="layout-sidenav-toggle navbar-nav d-lg-none align-items-lg-center mr-auto">
            <a class="nav-item nav-link px-0 mr-lg-4" href="javascript:void(0)">
              <i class="ion ion-md-menu text-large align-middle"></i>
            </a>
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
                <i class="ion ion-ios-search navbar-icon align-middle"></i>
                <span class="navbar-search-input pl-2">
                  <input type="text" class="form-control navbar-text mx-2" placeholder="Search..." style="width:200px">
                </span>
              </label>
            </div>

            <div class="navbar-nav align-items-lg-center ml-auto">
              <div class="demo-navbar-notifications nav-item dropdown mr-lg-3">
                <a class="nav-link dropdown-toggle hide-arrow" href="#" data-toggle="dropdown">
                  <i class="ion ion-md-notifications-outline navbar-icon align-middle"></i>
                  <span class="badge badge-primary badge-dot indicator"></span>
                  <span class="d-lg-none align-middle">&nbsp; Notifications</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="bg-primary text-center text-white font-weight-bold p-3">
                    4 New Notifications
                  </div>
                  <div class="list-group list-group-flush">
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action media d-flex align-items-center">
                      <div class="ui-icon ui-icon-sm ion ion-md-home bg-secondary border-0 text-white"></div>
                      <div class="media-body line-height-condenced ml-3">
                        <div class="text-body">Login from 192.168.1.1</div>
                        <div class="text-light small mt-1">
                          Aliquam ex eros, imperdiet vulputate hendrerit et.
                        </div>
                        <div class="text-light small mt-1">12h ago</div>
                      </div>
                    </a>

                    <a href="javascript:void(0)" class="list-group-item list-group-item-action media d-flex align-items-center">
                      <div class="ui-icon ui-icon-sm ion ion-md-person-add bg-info border-0 text-white"></div>
                      <div class="media-body line-height-condenced ml-3">
                        <div class="text-body">You have <strong>4</strong> new followers</div>
                        <div class="text-light small mt-1">
                          Phasellus nunc nisl, posuere cursus pretium nec, dictum vehicula tellus.
                        </div>
                      </div>
                    </a>

                    <a href="javascript:void(0)" class="list-group-item list-group-item-action media d-flex align-items-center">
                      <div class="ui-icon ui-icon-sm ion ion-md-power bg-danger border-0 text-white"></div>
                      <div class="media-body line-height-condenced ml-3">
                        <div class="text-body">Server restarted</div>
                        <div class="text-light small mt-1">
                          19h ago
                        </div>
                      </div>
                    </a>

                    <a href="javascript:void(0)" class="list-group-item list-group-item-action media d-flex align-items-center">
                      <div class="ui-icon ui-icon-sm ion ion-md-warning bg-warning border-0 text-body"></div>
                      <div class="media-body line-height-condenced ml-3">
                        <div class="text-body">99% server load</div>
                        <div class="text-light small mt-1">
                          Etiam nec fringilla magna. Donec mi metus.
                        </div>
                        <div class="text-light small mt-1">
                          20h ago
                        </div>
                      </div>
                    </a>
                  </div>

                  <a href="javascript:void(0)" class="d-block text-center text-light small p-2 my-1">Show all notifications</a>
                </div>
              </div>

              <div class="demo-navbar-messages nav-item dropdown mr-lg-3">
                <a class="nav-link dropdown-toggle hide-arrow" href="#" data-toggle="dropdown">
                  <i class="ion ion-ios-mail navbar-icon align-middle"></i>
                  <span class="badge badge-primary badge-dot indicator"></span>
                  <span class="d-lg-none align-middle">&nbsp; Messages</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <div class="bg-primary text-center text-white font-weight-bold p-3">
                    4 New Messages
                  </div>
                  <div class="list-group list-group-flush">
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action media d-flex align-items-center">
                      <img src="assets/img/avatars/6-small.png" class="d-block ui-w-40 rounded-circle" alt>
                      <div class="media-body ml-3">
                        <div class="text-body line-height-condenced">Sit meis deleniti eu, pri vidit meliore docendi ut.</div>
                        <div class="text-light small mt-1">
                          Mae Gibson &nbsp;·&nbsp; 58m ago
                        </div>
                      </div>
                    </a>

                    <a href="javascript:void(0)" class="list-group-item list-group-item-action media d-flex align-items-center">
                      <img src="assets/img/avatars/4-small.png" class="d-block ui-w-40 rounded-circle" alt>
                      <div class="media-body ml-3">
                        <div class="text-body line-height-condenced">Mea et legere fuisset, ius amet purto luptatum te.</div>
                        <div class="text-light small mt-1">
                          Kenneth Frazier &nbsp;·&nbsp; 1h ago
                        </div>
                      </div>
                    </a>

                    <a href="javascript:void(0)" class="list-group-item list-group-item-action media d-flex align-items-center">
                      <img src="assets/img/avatars/5-small.png" class="d-block ui-w-40 rounded-circle" alt>
                      <div class="media-body ml-3">
                        <div class="text-body line-height-condenced">Sit meis deleniti eu, pri vidit meliore docendi ut.</div>
                        <div class="text-light small mt-1">
                          Nelle Maxwell &nbsp;·&nbsp; 2h ago
                        </div>
                      </div>
                    </a>

                    <a href="javascript:void(0)" class="list-group-item list-group-item-action media d-flex align-items-center">
                      <img src="assets/img/avatars/11-small.png" class="d-block ui-w-40 rounded-circle" alt>
                      <div class="media-body ml-3">
                        <div class="text-body line-height-condenced">Lorem ipsum dolor sit amet, vis erat denique in, dicunt prodesset te vix.</div>
                        <div class="text-light small mt-1">
                          Belle Ross &nbsp;·&nbsp; 5h ago
                        </div>
                      </div>
                    </a>
                  </div>

                  <a href="javascript:void(0)" class="d-block text-center text-light small p-2 my-1">Show all messages</a>
                </div>
              </div>

              <!-- Divider -->
              <div class="nav-item d-none d-lg-block text-big font-weight-light line-height-1 opacity-25 mr-3 ml-1">|</div>

              <div class="demo-navbar-user nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                  <span class="d-inline-flex flex-lg-row-reverse align-items-center align-middle">
                    <img src="assets/img/avatars/1.png" alt class="d-block ui-w-30 rounded-circle">
                    <span class="px-1 mr-lg-2 ml-2 ml-lg-0"><?php echo $nome ?></span>
                  </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a href="pages/perfil.php" class="dropdown-item"><i class="ion ion-ios-person text-lightest"></i> &nbsp; Meu Perfil</a>
                  <a href="pages/editperfil.php" class="dropdown-item"><i class="ion ion-md-settings text-lightest"></i> &nbsp; Configurações</a>
                  <div class="dropdown-divider"></div>
                  <a href="config/logoff.php" class="dropdown-item"><i class="ion ion-ios-log-out text-danger"></i> &nbsp; Sair</a>
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

            <h4 class="font-weight-bold py-3 mb-4">
              Dashboard
              <div class="text-muted text-tiny mt-1"><small class="font-weight-normal">Today is Tuesday, 8 February 2018</small></div>
            </h4>

            <!-- Counters -->
            <div class="row">
              <div class="col-sm-6 col-xl-3">

                <div class="card mb-4">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="lnr lnr-cart display-4 text-success"></div>
                      <div class="ml-3">
                        <div class="text-muted small">Monthly sales</div>
                        <div class="text-large">2362</div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-sm-6 col-xl-3">

                <div class="card mb-4">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="lnr lnr-earth display-4 text-info"></div>
                      <div class="ml-3">
                        <div class="text-muted small">Monthly visits</div>
                        <div class="text-large">687,123</div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-sm-6 col-xl-3">

                <div class="card mb-4">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="lnr lnr-gift display-4 text-danger"></div>
                      <div class="ml-3">
                        <div class="text-muted small">Products</div>
                        <div class="text-large">985</div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-sm-6 col-xl-3">

                <div class="card mb-4">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="lnr lnr-users display-4 text-warning"></div>
                      <div class="ml-3">
                        <div class="text-muted small">Users</div>
                        <div class="text-large">105,652</div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- / Counters -->

            <!-- Statistics -->
            <div class="card mb-4">
              <h6 class="card-header with-elements">
                <div class="card-header-title">Statistics</div>
                <div class="card-header-elements ml-auto">
                  <label class="text m-0">
                    <span class="text-light text-tiny font-weight-semibold align-middle">
                      SHOW STATS
                    </span>
                    <span class="switcher switcher-sm d-inline-block align-middle mr-0 ml-2">
                      <input type="checkbox" class="switcher-input" checked>
                      <span class="switcher-indicator">
                        <span class="switcher-yes"></span>
                        <span class="switcher-no"></span>
                      </span>
                    </span>
                  </label>
                </div>
              </h6>
              <div class="row no-gutters row-bordered">
                <div class="col-md-8 col-lg-12 col-xl-8">
                  <div class="card-body">
                    <div style="height: 210px;">
                      <canvas id="statistics-chart-1"></canvas>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-lg-12 col-xl-4">
                  <div class="card-body">

                    <!-- Numbers -->
                    <div class="row">
                      <div class="col-6 col-xl-5 text-muted mb-3">Total sales</div>
                      <div class="col-6 col-xl-7 mb-3">
                        <span class="text-big">10,332</span>
                        <sup class="text-success">+12%</sup>
                      </div>
                      <div class="col-6 col-xl-5 text-muted mb-3">Income amount</div>
                      <div class="col-6 col-xl-7 mb-3">
                        <span class="text-big">$1,534</span>
                        <sup class="text-danger">-5%</sup>
                      </div>
                      <div class="col-6 col-xl-5 text-muted mb-3">Total budget</div>
                      <div class="col-6 col-xl-7 mb-3">
                        <span class="text-big">$10,534</span>
                        <sup class="text-success">+12%</sup>
                      </div>
                      <div class="col-6 col-xl-5 text-muted mb-3">Page views</div>
                      <div class="col-6 col-xl-7 mb-3">
                        <span class="text-big">21,332</span>
                        <sup class="text-danger">-12%</sup>
                      </div>
                      <div class="col-6 col-xl-5 text-muted mb-3">Completed tasks</div>
                      <div class="col-6 col-xl-7 mb-3">
                        <span class="text-big">12</span>
                        <sup class="text-success">+12%</sup>
                      </div>
                    </div>
                    <!-- / Numbers -->

                  </div>
                </div>
              </div>
            </div>
            <!-- / Statistics -->

            <div class="row">

              <!-- Charts -->
              <div class="col-sm-6 col-xl-4">

                <div class="card mb-4">
                  <h6 class="card-header with-elements border-0 pr-0 pb-0">
                    <div class="card-header-title">Sales</div>
                    <div class="card-header-elements ml-auto">
                      <div class="btn-group mr-3">
                        <button type="button" class="btn btn-sm btn-default icon-btn borderless rounded-pill md-btn-flat dropdown-toggle hide-arrow" data-toggle="dropdown">
                          <i class="ion ion-ios-more"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" id="sales-dropdown-menu">
                          <a class="dropdown-item" href="javascript:void(0)">Action 1</a>
                          <a class="dropdown-item" href="javascript:void(0)">Action 2</a>
                        </div>
                      </div>
                    </div>
                  </h6>
                  <div class="mt-3">
                    <div style="height:100px;">
                      <canvas id="statistics-chart-2"></canvas>
                    </div>
                  </div>
                  <div class="card-footer text-center py-2">
                    <div class="row">
                      <div class="col">
                        <div class="text-muted small">Target</div>
                        <strong class="text-big">500</strong>
                      </div>
                      <div class="col">
                        <div class="text-muted small">Current</div>
                        <strong class="text-big">421</strong>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-sm-6 col-xl-4">

                <div class="card mb-4">
                  <div class="card-body">
                    <div class="float-right text-success">
                      <small class="ion ion-md-arrow-round-up text-tiny"></small> 12%
                    </div>
                    <div class="text-muted small">Total revenue</div>
                    <div class="text-xlarge">$1,534</div>
                  </div>
                  <div class="px-2">
                    <div class="w-100" style="height: 117px;">
                      <canvas id="statistics-chart-3"></canvas>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-sm-6 col-xl-4">

                <div class="card mb-4">
                  <div class="card-body pb-0">
                    <div class="text-right small mb-4">Aug 2017 - Feb 2018</div>
                    <div class="my-3" style="height: 86px;">
                      <canvas id="statistics-chart-4"></canvas>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="button" class="btn btn-xs btn-outline-primary icon-btn float-right"><i class="ion ion-md-sync"></i></button>
                    Unique visitors
                  </div>
                </div>

              </div>
              <div class="col-sm-6 col-xl-3">

                <div class="card mb-4">
                  <h6 class="card-header bg-success text-white">
                    <i class="ion ion-md-cash"></i>&nbsp;
                    Revenue
                  </h6>
                  <div class="bg-success text-white">
                    <div class="d-flex align-items-center position-relative mt-4" style="height:140px;">
                      <div class="w-100 position-absolute" style="height:140px;top:0;">
                        <canvas id="statistics-chart-5"></canvas>
                      </div>
                      <div class="w-100 text-center text-xlarge">85</div>
                    </div>
                    <div class="text-center mt-3 mb-4">
                      Sales today
                    </div>
                  </div>
                  <div class="card-footer border-0 text-center py-3">
                    <div class="row">
                      <div class="col">
                        <div class="text-muted small mb-1">Target</div>
                        <strong class="text-big">$1225</strong>
                      </div>
                      <div class="col">
                        <div class="text-muted small mb-1">Current</div>
                        <strong class="text-big">$654</strong>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <!-- / Charts -->

              <div class="col-xl-9">

                <div class="row">
                  <div class="col-md-6">

                    <!-- Tasks -->
                    <div class="card mb-4">
                      <h6 class="card-header with-elements">
                        <div class="card-header-title">Tasks</div>
                        <div class="card-header-elements ml-auto">
                          <button type="button" class="btn btn-default btn-xs md-btn-flat">Show more</button>
                        </div>
                      </h6>
                      <div style="height: 234px" id="tasks-inner">
                        <div class="card-body">
                          <p class="text-muted small">Today</p>
                          <div class="custom-controls-stacked">
                            <label class="ui-todo-item custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input">
                              <span class="custom-control-label">Buy products</span>
                              <span class="ui-todo-badge badge badge-outline-default font-weight-normal ml-2">58 mins left</span>
                            </label>
                            <label class="ui-todo-item custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input">
                              <span class="custom-control-label">Reply to emails</span>
                            </label>
                            <label class="ui-todo-item custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input">
                              <span class="custom-control-label">Write blog post</span>
                              <span class="ui-todo-badge badge badge-outline-default font-weight-normal ml-2">20 hours left</span>
                            </label>
                            <label class="ui-todo-item custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" checked>
                              <span class="custom-control-label">Wash my car</span>
                            </label>
                          </div>
                        </div>
                        <hr class="m-0">
                        <div class="card-body">
                          <p class="text-muted small">Tomorrow</p>
                          <div class="custom-controls-stacked">
                            <label class="ui-todo-item custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input">
                              <span class="custom-control-label">Buy antivirus</span>
                            </label>
                            <label class="ui-todo-item custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input">
                              <span class="custom-control-label">Jane's Happy Birthday</span>
                            </label>
                            <label class="ui-todo-item custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input">
                              <span class="custom-control-label">Call mom</span>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Type your task">
                          <div class="input-group-append">
                            <button type="button" class="btn btn-primary">Add</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- / Tasks -->

                  </div>
                  <div class="col-md-6">

                    <!-- Team ToDo -->
                    <div class="card mb-4">
                      <h6 class="card-header with-elements">
                        <div class="card-header-title">Team TODO</div>
                        <div class="card-header-elements ml-auto">
                          <button type="button" class="btn btn-default btn-xs md-btn-flat">Show more</button>
                        </div>
                      </h6>
                      <div style="height: 300px" id="team-todo-inner">
                        <div class="card-body">
                          <div class="rounded ui-bordered p-3 mb-3">
                            Lorem ipsum dolor sit amet, vis erat denique in, dicunt prodesset te vix.
                            <div class="media align-items-center mt-3">
                              <img src="assets/img/avatars/12-small.png" class="d-block ui-w-30 rounded-circle" alt>
                              <div class="media-body ml-2">Arthur Duncan</div>
                              <div class="text-muted small text-nowrap">02/08/2018</div>
                            </div>
                          </div>
                          <div class="rounded ui-bordered p-3 mb-3">
                            Sit meis deleniti eu, pri vidit meliore docendi ut.
                            <div class="media align-items-center mt-3">
                              <img src="assets/img/avatars/11-small.png" class="d-block ui-w-30 rounded-circle" alt>
                              <div class="media-body ml-2">Belle Ross</div>
                              <div class="text-muted small text-nowrap">02/06/2018</div>
                            </div>
                          </div>
                          <div class="rounded ui-bordered p-3">
                            Cum ea graeci tractatos.
                            <div class="media align-items-center mt-3">
                              <img src="assets/img/avatars/10-small.png" class="d-block ui-w-30 rounded-circle" alt>
                              <div class="media-body ml-2">Wayne Morgan</div>
                              <div class="text-muted small text-nowrap">02/04/2018</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- / Team ToDo -->

                  </div>
                </div>

              </div>
              <div class="col-md-8">

                <!-- Sale stats -->
                <div class="card mb-4">
                  <h6 class="card-header with-elements">
                    <div class="card-header-title">Sale stats</div>
                    <div class="card-header-elements ml-auto">
                      <button type="button" class="btn btn-default btn-xs md-btn-flat">Show more</button>
                    </div>
                  </h6>
                  <div class="table-responsive">
                    <table class="table card-table">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Sales</th>
                          <th>Cancelled</th>
                          <th>Delivered</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>02/08/2018</td>
                          <td>12</td>
                          <td>1</td>
                          <td>5</td>
                        </tr>
                        <tr>
                          <td>02/07/2018</td>
                          <td>16</td>
                          <td>2</td>
                          <td>8</td>
                        </tr>
                        <tr>
                          <td>02/06/2018</td>
                          <td>5</td>
                          <td>0</td>
                          <td>2</td>
                        </tr>
                        <tr>
                          <td>02/05/2018</td>
                          <td>21</td>
                          <td>1</td>
                          <td>10</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- / Sale stats -->

              </div>
              <div class="col-md-4">

                <!-- Type gadgets chart -->
                <div class="card mb-4">
                  <h6 class="card-header with-elements">
                    <div class="card-header-title">Type gadgets</div>
                    <div class="card-header-elements ml-auto">
                      <button type="button" class="btn btn-outline-primary btn-xs icon-btn md-btn-flat">
                        <i class="ion ion-md-sync"></i>
                      </button>
                    </div>
                  </h6>
                  <div class="py-4 px-3">
                    <div style="height:162px;">
                      <canvas id="statistics-chart-6"></canvas>
                    </div>
                  </div>
                </div>
                <!-- / Type gadgets chart -->

              </div>
              <div class="col-md-6 col-lg-12 col-xl-6">

                <!-- Comments -->
                <div class="card mb-4">
                  <h6 class="card-header">Comments</h6>
                  <div class="card-body">
                    <div class="media pb-1 mb-3">
                      <img src="assets/img/avatars/9-small.png" class="d-block ui-w-40 rounded-circle" alt>
                      <div class="media-body ml-3">
                        <a href="javascript:void(0)">Amanda Warner</a>
                        <span class="text-muted">commented on</span>
                        <a href="javascript:void(0)">Article Name</a>
                        <p class="my-1">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.</p>
                        <div class="clearfix">
                          <a href="javascript:void(0)" class="float-right text-lightest small">
                            <span class="ion ion-ios-thumbs-down"></span>
                          </a>
                          <a href="javascript:void(0)" class="float-right text-lightest small">
                            <span class="ion ion-ios-thumbs-up mr-2"></span>
                          </a>
                          <span class="float-left text-muted small">2 hours ago</span>
                        </div>
                      </div>
                    </div>
                    <div class="media pb-1 mb-3">
                      <img src="assets/img/avatars/8-small.png" class="d-block ui-w-40 rounded-circle" alt>
                      <div class="media-body ml-3">
                        <a href="javascript:void(0)">Hallie Lewis</a>
                        <span class="text-muted">commented on</span>
                        <a href="javascript:void(0)">Article Name</a>
                        <p class="my-1">Vivendum torquatos ut nec, sit audiam deterruisset ei, cu sed nibh autem scriptorem. Ea quo vidit deleniti constituto, ex qui malis mollis iudicabit, viris fabellas id has.</p>
                        <div class="clearfix">
                          <a href="javascript:void(0)" class="float-right text-lightest small">
                            <span class="ion ion-ios-thumbs-down"></span>
                          </a>
                          <a href="javascript:void(0)" class="float-right text-lightest small">
                            <span class="ion ion-ios-thumbs-up mr-2"></span>
                          </a>
                          <span class="float-left text-muted small">2 hours ago</span>
                        </div>
                      </div>
                    </div>
                    <div class="media">
                      <img src="assets/img/avatars/7-small.png" class="d-block ui-w-40 rounded-circle" alt>
                      <div class="media-body ml-3">
                        <a href="javascript:void(0)">Alice Hampton</a>
                        <span class="text-muted">commented on</span>
                        <a href="javascript:void(0)">Article Name</a>
                        <p class="my-1">Eam facilis laboramus reprehendunt ei, ex esse fastidii per.</p>
                        <div class="clearfix">
                          <a href="javascript:void(0)" class="float-right text-lightest small">
                            <span class="ion ion-ios-thumbs-down"></span>
                          </a>
                          <a href="javascript:void(0)" class="float-right text-lightest small">
                            <span class="ion ion-ios-thumbs-up mr-2"></span>
                          </a>
                          <span class="float-left text-muted small">2 hours ago</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <a href="javascript:void(0)" class="card-footer d-block text-center text-body small font-weight-semibold">SHOW MORE</a>
                </div>
                <!-- / Comments -->

              </div>
              <div class="col-md-6 col-lg-12 col-xl-6">

                <!-- Support tickets -->
                <div class="card mb-4">
                  <h6 class="card-header">Support tickets</h6>
                  <div class="card-body">
                    <div class="pb-1 mb-3">
                      <div class="badge badge-outline-warning float-right">Feature</div>
                      <a href="javascript:void(0)">Lorem ipsum dolor sit amet, vis erat denique in.</a>&nbsp;
                      <span class="text-muted">#34563</span>
                      <br>
                      <small class="text-muted">Created by <a href="javascript:void(0)" class="text-body">Mike Greene</a> &nbsp;·&nbsp; 1 day ago</small>
                    </div>
                    <div class="pb-1 mb-3">
                      <div class="badge badge-outline-danger float-right">Bug</div>
                      <a href="javascript:void(0)">Dicunt prodesset te vix.</a>&nbsp;
                      <span class="text-muted">#34524</span>
                      <br>
                      <small class="text-muted">Created by <a href="javascript:void(0)" class="text-body">Leon Wilson</a> &nbsp;·&nbsp; 1 day ago</small>
                    </div>
                    <div class="pb-1 mb-3">
                      <div class="badge badge-outline-success float-right">Question</div>
                      <a href="javascript:void(0)">Sit meis deleniti eu, pri vidit meliore docendi ut?</a>&nbsp;
                      <span class="text-muted">#34563</span>
                      <br>
                      <small class="text-muted">Created by <a href="javascript:void(0)" class="text-body">Allie Rodriguez</a> &nbsp;·&nbsp; 1 day ago</small>
                    </div>
                    <div class="pb-1 mb-3">
                      <div class="badge badge-outline-secondary float-right">Enhancement</div>
                      <a href="javascript:void(0)">Eu tantas offendit mnesarchum sit, vide novum ad pri.</a>&nbsp;
                      <span class="text-muted">#34563</span>
                      <br>
                      <small class="text-muted">Created by <a href="javascript:void(0)" class="text-body"> Kenneth Frazier</a> &nbsp;·&nbsp; 1 day ago</small>
                    </div>
                    <div>
                      <div class="badge badge-outline-danger float-right">Bug</div>
                      <a href="javascript:void(0)">Dicunt prodesset te vix.</a>&nbsp;
                      <span class="text-muted">#34524</span>
                      <br>
                      <small class="text-muted">Created by <a href="javascript:void(0)" class="text-body">Leon Wilson</a> &nbsp;·&nbsp; 1 day ago</small>
                    </div>
                  </div>
                  <a href="javascript:void(0)" class="card-footer d-block text-center text-body small font-weight-semibold">SHOW MORE</a>
                </div>
                <!-- / Support tickets -->

              </div>
            </div>

          </div>
          <!-- / Content -->

          <!-- Layout footer -->
          <nav class="layout-footer footer bg-footer-theme">
            <div class="container-fluid d-flex flex-wrap justify-content-between text-center container-p-x pb-3">
              <div class="pt-3">
                <span class="footer-text font-weight-bolder">OffRoad</span> ©
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
  <script src="assets/vendor/libs/chartjs/chartjs.js"></script>

  <!-- Demo -->
  <script src="assets/js/demo.js"></script>
  <script src="assets/js/dashboards_dashboard-1.js"></script>
</body>

</html>