<?php
  session_start();
  include("../config/verifica.php"); //Verifica a sessão esta ativa
  include("../config/conn.php"); //Importa conexão com banco de dados
  $name = $_SESSION['LOGIN_USUARIO'];

  $res = mysqli_query($con,"SELECT idUsuario, usuNome from usuario WHERE usuEmail = '$name' "); //Consulta se o email da SESSION é o mesmo do usuario que esta logado
  $showID = mysqli_fetch_assoc($res);
  $id = $showID['idUsuario']; //Pega o id do usuario logado
  
  $nome = $showID['usuNome'];
  $even = mysqli_query($con,"SELECT idEventos, evenNome, evenDescr, evenHoraInicial, evenHoraFinal, evenTipoTrilha, evenVlrInscri, evenData from evento WHERE promoter_idUsuario = '$id' AND evenData >= DATE_FORMAT(NOW(), '%Y-%m-%d');")or die(mysqli_error($con));

  
?>
<!DOCTYPE html>

<html lang="pt-br" class="default-style">

<head>
  <title>Cadastrar Evento</title>

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="assets/vendor/libs/datatables/datatables.css">
  <script src="assets/vendor/libs/datatables/datatables.js"></script>
  <script src="assets/vendor/js/polyfills.js"></script>
  <script>document['documentMode']===10&&document.write('<script src="https://polyfill.io/v3/polyfill.min.js?features=Intl.~locale.en"><\/script>')</script>

  <script src="assets/vendor/js/material-ripple.js"></script>
  <script src="assets/vendor/js/layout-helpers.js"></script>

  <!-- Theme settings -->
  <!-- This file MUST be included after core stylesheets and layout-helpers.js in the <head> section -->
  <script src="assets/vendor/js/theme-settings.js"></script>

  <!-- Core scripts -->
  <script src="assets/vendor/js/pace.js"></script>

  <script>
    window.themeSettings = new ThemeSettings({
      cssPath: 'assets/vendor/css/rtl/',
      themesPath: 'assets/vendor/css/rtl/'
    });
  </script>

  <script type="text/javascript">
      setTimeout(function () {
      document.getElementById("erro").style.display = "none";
        }, 3000);
        function hide(){
            document.getElementById("erro").style.display = "none";
  }
  </script>
  <script type="text/javascript">
      setTimeout(function () {
      document.getElementById("erro6").style.display = "none";
        }, 10000);
        function hide(){
            document.getElementById("erro6").style.display = "none";
  }
  </script>
 
<!-- Libs -->
  <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
  <link rel="stylesheet" href="assets/vendor/libs/minicolors/minicolors.css">
  <link rel="stylesheet" href="assets/vendor/libs/toastr/toastr.css">
  <link rel="stylesheet" href="assets/vendor/libs/sweetalert2/sweetalert2.css">
  <link rel="stylesheet" href="assets/vendor/libs/flow-js/flow.css">


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
          <a href="index.html" class="app-brand-text demo sidenav-text font-weight-normal ml-2">APP Trilha</a>
          <a href="javascript:void(0)" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
            <i class="ion ion-md-menu align-middle"></i>
          </a>
        </div>

        <div class="sidenav-divider mt-0"></div>

        <!-- Links -->
        <ul class="sidenav-inner py-1">

          <!-- Resumo -->
          <li class="sidenav-item">
            <a href="../homeAdmin.php" class="sidenav-link"><i class="sidenav-icon ion ion-md-speedometer"></i>
              <div>Resumo</div>
            </a>
          </li>

          <!-- Meus Eventos -->
          <li class="sidenav-item open active">
            <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-md-calendar"></i>
              <div>Meus Eventos</div>
            </a>

            <ul class="sidenav-menu">
              <li class="sidenav-item open active">
                <a href="eventos.php" class="sidenav-link">
                  <div>Eventos</div>
                </a>
              </li>
              <li class="sidenav-item">
                <a href="encerrados.php" class="sidenav-link">
                  <div>Eventos Encerrados</div>
                </a>
              </li>
              <li class="sidenav-item">
                <a href="financeiro.php" class="sidenav-link">
                  <div>Finaceiro</div>
                </a>
              </li>
              <li class="sidenav-item">
                <a href="checkin.php" class="sidenav-link">
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
                <a href="minhascompras.php" class="sidenav-link">
                  <div>Minhas Compras</div>
                </a>
            </ul>
          </li>
          <!--Autorizações-->
          <li class="sidenav-item">
            <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-md-done-all"></i>
              <div>Autorizações</div>
            </a>

            <ul class="sidenav-menu">
              <li class="sidenav-item">
                <a href="solicitacoes.php" class="sidenav-link">Solicitações
                   <div class="pl-1 ml-auto">
                    <div class="badge badge-primary">59</div>
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

          <!-- Configurações -->
          <li class="sidenav-item">
            <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon ion ion-md-settings"></i>
              <div>Configurações</div>
            </a>

            <ul class="sidenav-menu">
              <li class="sidenav-item">
                <a href="editperfil.php" class="sidenav-link">
                  <div>Editar Perfil</div>
                </a>
              </li>
              <li class="sidenav-item">
                <a href="ajuda.php" class="sidenav-link">
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
                  <a href="../config/logoff.php" class="dropdown-item"><i class="ion ion-ios-log-out text-danger"></i> &nbsp; Sair</a>
                </div>
              </div>
          </div>
        </nav>
        <!-- / Layout navbar -->
        <!-- Layout content -->
    <div class="layout-content">
        <!-- Content -->
      <div class="container-fluid flex-grow-1 container-p-y">

        <!--painel de eventos-->
        <?php 
          error_reporting(0);
          $errou = $_GET['error'];
          switch ($errou) {
            case 1:
              echo "<div id='erro' class='alert alert-dark-success alert-dismissible fade show'>
                      <button type='button' class='close' onclick='hide()'>&times;</button>
                      Evento criado com sucesso!
                    </div>";
              break;
            case 2:
              echo "<div id='erro' class='alert alert-dark-danger alert-dismissible fade show'>
                    <button type='button' class='close' onclick='hide()'>&times;</button>
                    Erro ao cadastrar evento!
                  </div>";
              break;
            case 3:
              echo "<div id='erro'class='alert alert-dark-danger alert-dismissible fade show'>
                    <button type='button' class='close' onclick='hide()'>&times;</button>
                    O evento não pode acontecer em uma data anterior a atual!
                  </div>";
              break;
            case 4:
              echo "<div id='erro'class='alert alert-dark-success alert-dismissible fade show'>
                    <button type='button' class='close' onclick='hide()'>&times;</button>
                    Dados salvos com sucesso!
                  </div>";
              break;
            case 5:
              echo "<div id='erro'class='alert alert-dark-danger alert-dismissible fade show'>
                    <button type='button' class='close' onclick='hide()'>&times;</button>
                    Erro ao editar os dados!
                  </div>";
            break;
            case 6:
              echo "<a href='' data-toggle='modal' data-target='#myModalvlr'><div id='erro6'class='alert alert-dark-danger alert-dismissible fade show'>
                    <button type='button' class='close' onclick='hide()'>&times;</button>
                    Valor da inscrição não pode ser alterado! Clique Aqui...
                  </div></a>";
            default:
              # code...
              break;
          }
      ?>
      <div class="flow-error alert alert-danger">
          Your browser, unfortunately, is not supported by Flow.js. The library requires support for <a href="http://www.w3.org/TR/FileAPI/">the HTML5 File API</a> along with <a href="http://www.w3.org/TR/FileAPI/#normalization-of-params">file slicing</a>.
        </div>

        <div class="flow-drop py-5 px-3" ondragenter="$(this).addClass('flow-dragover')" ondragend="$(this).removeClass('flow-dragover')" ondrop="$(this).removeClass('flow-dragover')">
          <h4>Drop files here to upload or</h4>
          <button type="button" class="flow-browse btn btn-secondary">Select from your computer</button>
          <button type="button" class="flow-browse-image btn btn-secondary">Select images</button>
          <button type="button" class="flow-browse-folder btn btn-secondary">Select folder</button>
        </div>

        <div class="flow-progress media d-none mt-4">
          <div class="mr-3">
            <button type="button" onclick="r.upload(); return(false);" class="progress-resume-link btn icon-btn btn-primary"><i class="ion ion-md-play"></i></button>
            <button type="button" onclick="r.pause(); return(false);" class="progress-pause-link btn icon-btn btn-warning"><i class="ion ion-md-pause"></i></button>
            <button type="button" onclick="r.cancel(); return(false);" class="progress-cancel-link btn icon-btn btn-danger"><i class="ion ion-md-close"></i></button>
          </div>
          <div class="media-body align-self-center">
            <div class="progress-container progress">
              <div class="progress-bar"></div>
            </div>
          </div>
        </div>

        <ul class="flow-list list-group d-none mt-4"></ul>

        <!-- Javascript -->
        <script>
          $(function() {
            var r = new Flow({
              target: 'http://posttestserver.com/post.php',
              permanentErrors: [500, 501],
              maxChunkRetries: 1,
              chunkRetryInterval: 5000,
              simultaneousUploads: 1
            });

            // Flow.js isn't supported, fall back on a different method
            if (!r.support) {
              $('.flow-error').show();
              return ;
            }

            // Show a place for dropping/selecting files
            $('.flow-drop').show();
            r.assignDrop($('.flow-drop')[0]);
            r.assignBrowse($('.flow-browse')[0]);
            r.assignBrowse($('.flow-browse-folder')[0], true);
            r.assignBrowse($('.flow-browse-image')[0], false, false, {accept: 'image/*'});

            // Handle file add event
            r.on('fileAdded', function(file){
              // Show progress bar
              $('.flow-progress, .flow-list').removeClass('d-none');

              // Add the file to the list
              $('.flow-list').append(
                '<li class="flow-file list-group-item flow-file-'+file.uniqueIdentifier+'">' +
                  '<div class="flow-progress media">' +
                    '<div class="media-body">' +
                      '<div><strong class="flow-file-name"></strong> - <em class="flow-file-progress"><span class="text-muted">Waiting...</span></em></div>' +
                      '<div><small class="flow-file-size text-muted"></small></div>' +
                    '</div>' +
                    '<div class="align-self-center ml-3">' +
                      '<button type="button" class="flow-file-download btn btn-sm icon-btn btn-outline-primary"><i class="ion ion-md-download"></i></button>' +
                      '<button type="button" class="flow-file-pause btn btn-sm icon-btn btn-outline-warning"><i class="ion ion-md-pause"></i></button> ' +
                      '<button type="button" class="flow-file-resume btn btn-sm icon-btn btn-outline-success"><i class="ion ion-md-play"></i></button> ' +
                      '<button type="button" class="flow-file-cancel btn btn-sm icon-btn btn-outline-danger"><i class="ion ion-md-close"></i></button>' +
                    '</div>' +
                  '</div>' +
                '</li>'
              );
              var $self = $('.flow-file-'+file.uniqueIdentifier);
              $self.find('.flow-file-name').text(file.name);
              $self.find('.flow-file-size').text(readablizeBytes(file.size));
              $self.find('.flow-file-download').attr('href', '/download/' + file.uniqueIdentifier).hide();
              $self.find('.flow-file-pause').on('click', function () {
                file.pause();
                $self.find('.flow-file-pause').hide();
                $self.find('.flow-file-resume').show();
              });
              $self.find('.flow-file-resume').on('click', function () {
                file.resume();
                $self.find('.flow-file-pause').show();
                $self.find('.flow-file-resume').hide();
              }).hide();
              $self.find('.flow-file-cancel').on('click', function () {
                file.cancel();
                $self.remove();
              });
            });
            r.on('filesSubmitted', function(file) {
              r.upload();
            });
            r.on('complete', function(){
              // Hide pause/resume when the upload has completed
              $('.flow-progress .progress-resume-link, .flow-progress .progress-pause-link').hide();
            });
            r.on('fileSuccess', function(file,message){
              var $self = $('.flow-file-'+file.uniqueIdentifier);
              // Reflect that the file upload has completed
              $self.find('.flow-file-progress').text('(completed)');
              $self.find('.flow-file-pause, .flow-file-resume').remove();
              $self.find('.flow-file-download').attr('href', '/download/' + file.uniqueIdentifier).show();
            });
            r.on('fileError', function(file, message){
              // Reflect that the file upload has resulted in error
              $('.flow-file-'+file.uniqueIdentifier+' .flow-file-progress')
                .addClass('text-danger')
                .text('(file could not be uploaded: ' + message + ')');
            });
            r.on('fileProgress', function(file){
              // if (!file.averageSpeed || file.averageSpeed.indexOf('undefined') !== -1) { return; }
              console.log(file.averageSpeed)

              // Handle progress for both the file and the overall upload
              $('.flow-file-'+file.uniqueIdentifier+' .flow-file-progress')
                .html(Math.floor(file.progress()*100) + '% '
                  + readablizeBytes(file.averageSpeed) + '/s '
                  + secondsToStr(file.timeRemaining()) + ' remaining') ;
              $('.flow-progress .progress-bar').css({width:Math.floor(r.progress()*100) + '%'});
            });
            r.on('uploadStart', function(){
              // Show pause, hide resume
              $('.flow-progress .progress-resume-link').hide();
              $('.flow-progress .progress-pause-link').show();
            });
            r.on('catchAll', function() {
              console.log.apply(console, arguments);
            });
            window.r = {
              pause: function () {
                r.pause();
                // Show resume, hide pause
                $('.flow-file-resume').show();
                $('.flow-file-pause').hide();
                $('.flow-progress .progress-resume-link').show();
                $('.flow-progress .progress-pause-link').hide();
              },
              cancel: function() {
                r.cancel();
                $('.flow-progress .progress-resume-link').hide();
                $('.flow-progress .progress-pause-link').hide();
                $('.flow-progress .progress-bar').css({width: '0%'});
                $('.flow-file').remove();
              },
              upload: function() {
                $('.flow-file-pause').show();
                $('.flow-file-resume').hide();
                r.resume();
              },
              flow: r
            };

            function readablizeBytes(bytes) {
              if (!bytes) { return '0 kB'; }

              var s = ['bytes', 'kB', 'MB', 'GB', 'TB', 'PB'];
              var e = Math.floor(Math.log(bytes) / Math.log(1024));
              return (bytes / Math.pow(1024, e)).toFixed(2) + " " + s[e];
            }
            function secondsToStr (temp) {
              function numberEnding (number) {
                return (number > 1) ? 's' : '';
              }
              var years = Math.floor(temp / 31536000);
              if (years) {
                return years + ' year' + numberEnding(years);
              }
              var days = Math.floor((temp %= 31536000) / 86400);
              if (days) {
                return days + ' day' + numberEnding(days);
              }
              var hours = Math.floor((temp %= 86400) / 3600);
              if (hours) {
                return hours + ' hour' + numberEnding(hours);
              }
              var minutes = Math.floor((temp %= 3600) / 60);
              if (minutes) {
                return minutes + ' minute' + numberEnding(minutes);
              }
              var seconds = temp % 60;
              return seconds + ' second' + numberEnding(seconds);
            }
          });
        </script>
        <!-- / Javascript -->
                  <!--CADASTRO EVENTO-->
                    <form class="modal-content" method="post" action="../config/tratadados.php?opc=8&id=<?php echo $id ?>" autocomplete="on">
                      <div class="modal-header">
                        <h5 class="modal-title">
                          Cadastro de Eventos
                          <br>
                        <small class="text-muted"></small>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                      </div>
                      <div class="modal-body">
                        <div class="form-row">
                          <div class="form-group col">
                            <label class="form-label">Nome do Evento</label>
                            <input value="" name="nomeEven" type="text" required="" class="form-control" placeholder="Nome">
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col">
                            <label class="form-label">Descrição do Evento</label>      
                            <textarea value="" name="descEven" required="" id="autosize-demo" rows="3" class="form-control" placeholder="Descrição..."></textarea> 
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col">
                            <label class="form-label">Tipo da Trilha</label>
                            <div class="input-group">
                              <select name="tipoTrilha" class="custom-select flex-grow-1">
                                <option>Selecione...</option>
                                <option value="inteira">Trilha Completa</option>
                                <option value="meia">Meia Trilha</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-row"> 
                          <div class="form-group col">
                            <label class="form-label">Adesivo</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <label class="custom-control custom-checkbox px-2 m-0">
                                    <input value="Adesivo" type="checkbox" class="custom-control-input">
                                    <span  class="custom-control-label"></span>
                                  </label>
                                </div>
                              </div>
                              <input name="adeQtd" value="" placeholder="Quantidade..." type="text" class="form-control">
                            </div>                   
                          </div>
                          <div class="form-group col">
                            <label class="form-label">Almoço</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <label class="custom-control custom-checkbox px-2 m-0">
                                    <input name="eveAlmo" value="Almoco"  type="checkbox" class="custom-control-input">
                                    <span class="custom-control-label"></span>
                                  </label>
                                </div>
                              </div>
                              <input name="almoQtd" value="" placeholder="Quantidade..." type="text" class="form-control">
                            </div>                   
                          </div>
                          <div class="form-group col">
                            <label class="form-label">Bebida</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <label class="custom-control custom-checkbox px-2 m-0">
                                    <input value="Bebida" type="checkbox" class="custom-control-input">
                                    <span class="custom-control-label"></span>
                                  </label>
                                </div>
                              </div>
                              <input name="bebiQtd" value="" placeholder="Quantidade..." type="text" class="form-control">
                            </div>                   
                          </div>
                        <!-- DEFINE CAMISAS -->
                          
                        <!-- FIM DEFINE CAMISA -->
                        </div>
                        <div class="form-row">
                          <div class="form-group col">
                            <label class="form-label">Data do Evento</label>
                            <input value="" name="dataEvento" required="" type="date" class="form-control" id="flatpickr-full">
                          </div>
                          <div class="form-group col">
                            <label class="form-label">Horário de Inicio</label>
                            <input value="" name="horaInicio" required="" type="time" class="form-control" id="flatpickr-time">
                          </div>
                          <div class="form-group col">
                            <label class="form-label">Horário de Fim</label>
                            <input value="" name="horaFim" required="" type="time" class="form-control" id="flatpickr-time">
                          </div>
                          <div class="form-group col">
                            <label class="form-label">Valor da Trilha</label>
                            <input value="" name="vlrTrilha" required="" type="text" class="form-control" placeholder="R$0,00">
                          </div>
                        </div>
                       <div class="form-row">
                          <div class="form-group col">
                            <label class="form-label">Rua</label>
                            <input value="" name="rua" required="" type="text" class="form-control" placeholder="Rua">
                          </div>
                          <div class="form-group col">
                            <label class="form-label">Bairro</label>
                            <input value="" name="bairro" required="" type="text" class="form-control" placeholder="Bairro">
                          </div>
                          <div class="form-group col">
                            <label class="form-label">Cidade</label>
                            <input value="" name="cidade" required="" type="text" class="form-control" placeholder="Cidade">
                          </div>
                          <div class="form-group col">
                            <label class="form-label">Estado</label>
                            <input value="" name="estado" required="" type="text" class="form-control" placeholder="Estado">
                          </div>
                       </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                      </div>
                    </form>
                    <!--FIM DO FORM-->
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
  <script src="assets/vendor/libs/moment/moment.js"></script>
  <script src="assets/vendor/libs/minicolors/minicolors.js"></script>
  <script src="assets/vendor/libs/growl/growl.js"></script>
  <script src="assets/js/tables_datatables.js"></script>
  <script src="assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
  <script src="assets/vendor/libs/flow-js/flow.js"></script>


  <!-- Demo -->
  <script src="assets/js/demo.js"></script>
  <script src="assets/js/ui_notifications.js"></script>
  <script src="assets/js/tables_datatables.js"></script>


</body>

</html>