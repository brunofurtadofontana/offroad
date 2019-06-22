<?php
  session_start();
  include("config/verifica.php"); //Verifica a sessão esta ativa
  include("config/conn.php"); //Importa conexão com banco de dados
  $name = $_SESSION['LOGIN_USUARIO'];
  $res = mysqli_query($con,"SELECT users_id,users_nome from users WHERE users_email = '$name' "); //Consulta se o email da SESSION é o mesmo do usuario que esta logado
  $showID = mysqli_fetch_assoc($res);
  $id = $showID['users_id']; //Pega o id do usuario logado
  $name = $showID['users_nome'];

?>
<!DOCTYPE html>

<html lang="en" class="default-style">

<head>
  <title>Dashboard 1 - Dashboards - Appwork</title>

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
          <a href="index.html" class="app-brand-text demo sidenav-text font-weight-normal ml-2">Appwork</a>
          <a href="javascript:void(0)" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
            <i class="ion ion-md-menu align-middle"></i>
          </a>
        </div>

        <div class="sidenav-divider mt-0"></div>

        <!-- Links -->
        <ul class="sidenav-inner py-1">

          <!-- Dashboards -->
          <li class="sidenav-item">
            <a href="home.php" class="sidenav-link"><i class="sidenav-icon ion ion-md-speedometer"></i>
              <div>Dashboards</div>
            </a>
          </li>
          <!-- Computadores -->
          <li class="sidenav-item active">
            <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon lnr lnr-laptop"></i>
              <div>Computadores</div>
            </a>
            <ul class="sidenav-menu">
              <li class="sidenav-item"><a href="excluirPC.php" class="sidenav-link">Gerenciar</a></li>
            </ul>
          </li>
           <!-- Etiquetas -->
          <li class="sidenav-item active">
            <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon lnr lnr-tag"></i>
              <div>Etiquetas</div>
            </a>
             <ul class="sidenav-menu">
              <li class="sidenav-item">
                  <a href="listar.php" class="sidenav-link">
                    <div>Listar</div>
                  </a>
              </li>
            </ul>
          </li>
          <!-- Reservas -->
          <li class="sidenav-item active">
            <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon lnr lnr-calendar-full"></i>
              <div>Reservas</div>
            </a>
             <ul class="sidenav-menu">
              <li class="sidenav-item">
                  <a href="reservas.php" class="sidenav-link">
                    <div>Gerenciar</div>
                  </a>
              </li>
            </ul>
          </li>
          <!-- Usuários -->
          <li class="sidenav-item active">
            <a href="javascript:void(0)" class="sidenav-link sidenav-toggle"><i class="sidenav-icon lnr lnr-users"></i>
              <div>Usuários</div>
            </a>
             <ul class="sidenav-menu">
              <li class="sidenav-item"><a href="gerenciarUsers.php" class="sidenav-link">Gerenciar</a></li>
              
            </ul>
          </li>

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
            <span class="app-brand-text demo font-weight-normal ml-2">Appwork</span>
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
                    <img src="assets/img/avatars/13.png" alt class="d-block ui-w-30 rounded-circle">
                    <span class="px-1 mr-lg-2 ml-2 ml-lg-0"><?php echo $name; ?></span>
                  </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  
                  <a href="javascript:void(0)" class="dropdown-item"><i class="ion ion-md-settings text-lightest"></i> &nbsp; Account settings</a>
                  <div class="dropdown-divider"></div>
                  <a href="config/logoff.php" class="dropdown-item"><i class="ion ion-ios-log-out text-danger"></i> &nbsp; Log Out</a>
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
            
      

            <!-- The Modal Cadastrar -->
            <div class="modal" id="myModal">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header" >
                    <h4 class="modal-title">Cadastrar computadores</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                        <form action=" config/tratadados.php?id=<?php echo $id; ?>&opc=1" method="post">
                          <h4 class="title">Especificações</h4>
                          <input type="text" class="form-control" name="processador" placeholder="Modelo do Processador" required/><br>
                          <input type="text" class="form-control" name="memram" placeholder="Memória RAM" required/><br>
                          <input type="text" class="form-control" name="storage" placeholder="Disco Rigido" required/><br>
                          <input type="text" class="form-control" name="placamae" placeholder="Placa Mãe" required/><br>
                          <input type="text" class="form-control" name="fonte" placeholder="Fonte de alimentação" required/><br>
                          <h4>Possui Leitor CD/DVD</h4>
                          <input type="radio" value="sim" name="leitor" checked>SIM</br>
                          <input type="radio" value="nao" name="leitor">NÃO</br>
                          <h2>Finalidade</h2>
                          <select name="finalidade" class="form-control" required="required">
                            <option value='0'>Selecione uma opção</option>
                            <option value="Formatar">Formatar</option>
                            <option value="Montagem Manutenção">Montagem Manutenção</option>
                          </select><br>
                          <h4>Componentes</h4>  
                          <input type="checkbox" name="componentes[]" value="placa de vídeo">Placa de vídeo<br>
                          <input type="checkbox" name="componentes[]" value="placa de rede">Placa de rede<br>
                          <input type="checkbox" name="componentes[]" value="placa de som">Placa de som<br>
                          <input type="text" class="form-control" name="componentes[]" placeholder="Outros"><br>
                          <h4>Sistema Operacional</h4>  
                          <select name="so" class="form-control" required='required'>
                            <option value="0">Selecione uma opção</option>
                            <option value="windows">Windows</option>
                            <option value="MacOs">Mac Os</option>
                            <option value="linux">Linux</option>
                            <option value="mobile">Mobile</option>
                          </select><br>
                          <h4>Situação da máquina</h4>  
                          <select name="situacao" class="form-control" required>
                            <option value="0">Selecione uma opção</option>
                            <option value="defeito">Defeito</option>
                            <option value="em uso">Em Uso</option>
                            <option value="disponivel">Disponivel</option>
                          </select><br>
                          <h4>Observações</h4>
                          <textarea name="obs" class="form-control" placeholder="Alguma observação??"></textarea><br>
                          <input type="submit" class="btn btn-secondary" name="Enviar" value="Enviar"/><br>
                        </form>

                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  </div>

                </div>
              </div>
            </div><!-- FIM CADASTRAR MODAL -->

             <!-- The Modal USUARIOS-->
            <div class="modal" id="myModal2">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Cadastrar usuários</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <!-- Content -->

                      <div class="authentication-inner py-5">

                        <div class="card">
                          <div class="p-4 px-sm-5 pt-sm-5">
                            

                            <h5 class="text-center text-muted font-weight-normal mb-4">Digite seus dados para se cadastrar</h5>

                            <!-- Form -->
                            <form action="config/tratadados.php?opc=4" method="post">
                              <div class="form-group">
                                <input type="text" name='nome' placeholder="Nome:" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <input type="email" name="email" placeholder="Email" class="form-control" required>
                              </div>
                              <div class="form-group">
                                <input type="password" name="pass" placeholder="Senha" class="form-control" required>
                              </div>
                              <button type="submit" class="btn btn-secondary btn-block mt-4">Cadastrar</button>
                              
                            </form>
                            <!-- / Form -->

                          </div>
                        
                        </div>

                      
                    </div>

                    <!-- / Content -->
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  </div>

                </div>
              </div>
            </div><!-- FIM CADASTRAR MODAL -->
             <!-- The Modal Etiquetas-->
            <div class="modal" id="myModal4">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Verificar Etiquetas</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  </div>

                </div>
              </div>
            </div><!-- FIM Etiquetas MODAL -->
             <!-- The Modal Reservas-->
            <div class="modal" id="myModal3">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Cadastrar Reservas</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <form action="config/tratadados.php?id=<?php echo $id; ?>&opc=7" method="post">
                        <span>Selecione os computadores para fazer a reserva.</span><br>
                        <label>Data Inicial</label>
                        <input type="date" class="form-control" placeholder="Data inicial" name="datain"  />
                        <label>Data Final</label>
                        <input type="date" class="form-control" placeholder="Data final" name="datafim"  /><br>
                        <h3>Finalidade</h3>
                        <select name="finalidade" class="form-control" required="required">
                            <option value='0'>Selecione uma opção</option>
                            <option value="Formatar">Formatar</option>
                            <option value="Montagem Manutenção">Montagem Manutenção</option>
                        </select><br>
                        <h3>Computadores Disponíveis</h3>
                       
                        <?php
                            $resSelect = mysqli_query($con,"select *from computador WHERE comp_situacao = 'DISPONIVEL' ");
                            while($mostrarPC = mysqli_fetch_assoc($resSelect)):
                              $idCP = $mostrarPC['comp_id'];
                              $status = $mostrarPC['comp_situacao'];
                              $processador = $mostrarPC['comp_proc'];
                        ?>
                            <label class="custom-control custom-checkbox px-2 m-0" style="width:90%;background:#f2f3f4;border-radius:5px;">
                              <input class="custom-control-input" type="checkbox" name="comp[]" value="<?php echo $idCP; ?>">
                              <span class="custom-control-label">&nbsp; &nbsp;#id <?php echo $idCP ." / ". $processador; ?></span>
                            </label>
                        <?php
                            endwhile;
                        ?>
                        <br>
                      <input type="submit" class="btn btn-secondary" name="Enviar" value="Enviar"/><br>
                    </form>
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  </div>

                </div>
              </div>
            </div><!-- FIM CADASTRAR MODAL -->
            <h4 class="font-weight-bold py-3 mb-4">
              Dashboard
              <div class="text-muted text-tiny mt-1"><small class="font-weight-normal">
                <?php
                  setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                  date_default_timezone_set('America/Sao_Paulo');
                  echo strftime('%A, %d de %B de %Y', strtotime('today'));
                ?>

              </small></div>
            </h4>

            <!-- Counters -->
            <div class="row">
              <div class="col-sm-6 col-xl-3">

                <div class="card mb-4" data-toggle="modal" data-target="#myModal" style="cursor: pointer;">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="lnr lnr-file-add display-4 text-success"></div>
                      <div class="ml-3">
                        <div class="text-muted small">Cadastrar Computadores</div>
                        <div class="text-large">Cadastrados 
                                                  (<?php 
                                                  $contPC = mysqli_query($con,"select count(comp_id)as total from computador")or die(mysqli_error($con));
                                                  $res = mysqli_fetch_assoc($contPC);
                                                  $totalPC = $res['total'];
                                                   echo $totalPC;
                                                  ?>)
                                                
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-sm-6 col-xl-3">

                <div class="card mb-4" data-toggle="modal" data-target="#myModal3" style="cursor: pointer;">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="lnr lnr-calendar-full display-4 text-primary"></div>
                      <div class="ml-3">
                        <div class="text-muted small">Reservas</div>
                        <div class="text-large">Cadastrados(<?php 
                                                  $contPC = mysqli_query($con,"SELECT count(res_id)as total from reserva WHERE computador_users_users_id = $id")or die(mysql_error());
                                                  $res = mysqli_fetch_assoc($contPC);
                                                  $totalPC = $res['total'];
                                                   echo $totalPC;

                                                  ?>)
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-sm-6 col-xl-3">

                <div class="card mb-4" data-toggle="modal" data-target="#myModal4" style="cursor: pointer;">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="lnr lnr-tag display-4 text-danger"></div>
                      <div class="ml-3">
                        <div class="text-muted small">Verificar Etiquetas</div>
                        <div class="text-large">Cadastradas(<?php 
                                                  $contPC = mysqli_query($con,"select count(comp_id)as total from computador")or die(mysql_error());
                                                  $res = mysqli_fetch_assoc($contPC);
                                                  $totalPC = $res['total'];
                                                   echo $totalPC;
                                                  ?>)</div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-sm-6 col-xl-3">

                <div class="card mb-4"data-toggle="modal" data-target="#myModal2" style="cursor: pointer;">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                      <div class="lnr lnr-users display-4 text-warning"></div>
                      <div class="ml-3">
                        <div class="text-muted small">Cadastrar Usuários</div>
                        <div class="text-large">Cadastrados(<?php 
                                                  $contPC = mysqli_query($con,"select count(users_id)as total from users")or die(mysql_error());
                                                  $res = mysqli_fetch_assoc($contPC);
                                                  $totalPC = $res['total'];
                                                   echo $totalPC;

                                                  ?>)
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- / Counters -->
            <h4 class="font-weight-bold py-3 mb-4">
                  Computadores Disponíveis
                  <div class="text-muted text-tiny mt-1"><small class="font-weight-normal">
                      Computadores disponívies para reserva (
                      <?php 
                          $rs = mysqli_query($con,"select count(comp_id)as total from computador WHERE comp_situacao = 'DISPONIVEL' ")or die(mysqli_error());
                          $get = mysqli_fetch_assoc($rs);
                                                  $totalPC = $get['total'];
                                                   echo $totalPC;
                      ?>
                      ) 
                  </small></div>
                </h4>
            <div class="row"><!-- Lista de computadores disponíveis -->
                <?php
                    $res = mysqli_query($con,"select *from computador");
                    while($mostrar = mysqli_fetch_assoc($res)):
                      $idCP = $mostrar['comp_id'];
                      $status = $mostrar['comp_situacao'];
                ?>
                  <div class="card"  style="cursor: pointer;">
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <div class="lnr lnr-laptop display-4 text-<?php if($status == 'DISPONIVEL') echo 'success'; else echo 'danger';?>"></div>
                        <div class="ml-3">
                          <div class="text-muted small">Computador cod: #<?php
                                                                                if($idCP<10){
                                                                                 echo "0".$idCP; 
                                                                                }else{
                                                                                  echo $idCP;
                                                                                }
                                                                          ?>
                          </div>
                            <div class="text-large">
                                 <button class="btn btn-sm btn-<?php if($status == 'DISPONIVEL') echo 'success'; else echo 'danger';?>" type="button"><span class="ion ion-md-<?php if($status == 'DISPONIVEL') echo 'checkmark'; else echo 'close';?>"></span>&nbsp;&nbsp;<?php echo $status ?></button>
                                          
                            </div>
                        </div>
                      </div>
                    </div>
                  </div><!-- FIM CARD -->
                <?php endwhile; ?>
            </div><!-- FIM lista de computadores -->
            

          </div>
          <!-- / Content -->

          <!-- Layout footer -->
          <nav class="layout-footer footer bg-footer-theme">
            <div class="container-fluid d-flex flex-wrap justify-content-between text-center container-p-x pb-3">
              <div class="pt-3">
                <span class="footer-text font-weight-bolder">Appwork</span> ©
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