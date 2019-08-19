<?php
  session_start();
  //$compra = $_GET['compra'];
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
  <title>Checkout</title>

  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <link rel="icon" type="image/x-icon" href="favicon.ico">

  <!-- Use Ubuntu font instead of Roboto -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">

  <!-- Icon fonts -->
  <link rel="stylesheet" href="assets/vendor/fonts/ionicons.css">
  <link rel="stylesheet" href="assets/vendor/fonts/linearicons.css">

  <!-- Core stylesheets -->
  <link rel="stylesheet" href="assets/vendor/css/rtl/bootstrap.css" class="theme-settings-bootstrap-css">
  <link rel="stylesheet" href="assets/vendor/css/rtl/appwork.css" class="theme-settings-appwork-css">
  <link rel="stylesheet" href="assets/vendor/css/rtl/theme-corporate.css" class="theme-settings-theme-css">
  <link rel="stylesheet" href="assets/vendor/css/rtl/colors.css" class="theme-settings-colors-css">
  <link rel="stylesheet" href="assets/vendor/css/rtl/uikit.css">

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
  <script src="assets/vendor/js/pace.js"></script>

  <!-- Page -->
  <link rel="stylesheet" href="assets/css/shop.css">

  <!-- Libs -->
  <link rel="stylesheet" href="assets/vendor/libs/swiper/swiper.css">
  <link rel="stylesheet" href="assets/vendor/libs/smartwizard/smartwizard.css">
</head>
<body>
  <!-- Pace.js loader -->
  <div class="page-loader"><div class="bg-primary"></div></div>

    

  <!-- Navbar -->
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

  <!-- Path -->
  <div class="bg-light">
    <div class="container text-big py-4 px-3">
      Checkout
    </div>
  </div>
  <!-- / Path -->

  <!-- Wizard -->
  <div id="shop-checkout-wizard" class="container ui-bordered p-0 pb-4 my-5">

    <!-- Steps -->
    <ul class="px-4 px-lg-5 pt-4">
      <li>
        <a href="#shop-checkout-wizard-1" class="mb-4">
          <span class="sw-done-icon ion ion-md-checkmark"></span>
          <span class="sw-icon ion ion-ios-person"></span>
          <div class="text-light small">Primeira etapa</div>
          Dados pessoais
        </a>
      </li>
      <li>
        <a href="#shop-checkout-wizard-2" class="mb-4">
          <span class="sw-done-icon ion ion-md-checkmark"></span>
          <span class="sw-icon ion ion-md-card"></span>
          <div class="text-light small">Segunda etapa</div>
          Pagamento
        </a>
      </li>
      <li>
        <a href="#shop-checkout-wizard-3" class="mb-4">
          <span class="sw-done-icon ion ion-md-checkmark"></span>
          <span class="sw-icon ion ion-md-checkmark-circle-outline"></span>
          <div class="text-light small">Terceira etapa</div>
          Confirmação
        </a>
      </li>
    </ul>
    <!-- / Steps -->

    <div class="border-right-0 border-left-0 ui-bordered p-4 p-lg-5 mb-4">

      <!-- Shipping -->
      <div id="shop-checkout-wizard-1" class="animated fadeIn">
        <div class="form-group">
          <label class="form-label">Nome</label>
          <input type="text" class="form-control" name="nome" placeholder="Nome completo" required>
        </div>
        <div class="form-group">
          <label class="form-label">Email</label>
          <input type="text" class="form-control" name="email" placeholder="exemplo@gmail.com" required>
        </div>
        <div class="form-group" required>
          <label class="form-label">Tipo de trilha</label>
          <select class="form-control">
            <option>Escolha uma opção</option>
            <option>Meia trilha</option>
            <option>Trilha inteira</option>
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">Almoços</label>
          <select class="form-control">
            <option value="0">Escolha uma opção</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>
      
        <hr class="mx-n4 mx-lg-n5 my-4">
        <?php 
            include("config/conn.php");
            $idGET = $_GET['idEvento'];
            $res = mysqli_query($con,"select *from evento where idEventos = $idGET ")or die(mysqli_error($con));
            $mostrar = mysqli_fetch_assoc($res);
            $valor = $mostrar['evenVlrInscri'];
            $title = $mostrar['evenNome'];
            $data = $mostrar['evenData'];
            $data = str_replace("/", "-", $data);
            
           
        ?>
        <h6 class="pt-2 mb-4">Valor da trilha</h6>
          <div class="row">
              <div class="col-md-6 mb-4">
                <a class="d-block border-primary rounded ui-bordered text-primary p-3" href="#">
                  <span><?php echo $title; ?> -
                    <strong>
                        R$ <?php echo $valor ?>,00
                    </strong>
                  </span>
                  <br>
                  <small class="text-muted">Data do evento: <?php echo date('d-m-Y', strtotime($data)); ?></small>
                </a>
              </div>
              
            </div>
     

      </div>
      <!-- / Shipping -->
      
      <!-- Payment -->
      <div id="shop-checkout-wizard-2" class="animated fadeIn">
        <div class="mx-auto" style="max-width: 400px;">
          <ul class="nav nav-tabs tabs-alt">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center h-100 py-1 active" data-toggle="tab" href="#payment-methods-cc">
                <span class="ion ion-md-card text-big mx-3"></span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center h-100 py-1" data-toggle="tab" href="#payment-methods-paypal">
                <i class="ion ion-md-barcode"></i>
                <!-- <img src="assets/img/payment/PayPal-light.png" class="ui-payment-small" alt> -->
              </a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade show ui-bordered p-4 active" id="payment-methods-cc">
              <form  name="Form1" id="Form1" method="post" action="payment/controllerPedido.php">

              <div class="form-group">
                <label class="d-flex justify-content-between align-items-end">
                  <span class="form-label mb-0">Número do cartão</span>
                  <!-- <img src="assets/img/payment/Visa-light.png" class="ui-payment-small" alt> -->
                  <div class="BandeiraCartao"></div>
                </label>
                <input type="text" id="NumeroCartao" name="NumeroCartao"  class="form-control" placeholder="XXXX-XXXX-XXXX-XXXX" maxlength="16">
                <input type="hidden" id="TokenCard" name="TokenCard">
                <input type="hidden" id="HashCard" name="HashCard">
                <input type="hidden" id="ValorParcelas" name="ValorParcelas">
                <script type="text/javascript">
                  var valor = <?php echo $valor; ?>;
                </script>
                <input type="hidden" id="Valor" name="Valor"  value="<?php echo $valor; ?>.00">
              </div>
              <div class="form-group">
                <select class="form-control" name="QtdParcelas" id="QtdParcelas">
                    <option value="">Selecione</option>
                </select>
              </div>
              <div class="form-group">
                <label class="form-label">Nome impresso no cartão</label>
                <input type="text" class="form-control" placeholder="Nome no cartão" name="NomeCartao" required>
              </div>

              <div class="form-row">
                <div class="col">
                  <label class="form-label">Data Validade</label>
                  <input type="text" class="form-control" placeholder="MM" id="mesVal" name="mesVal" maxlength="2"required>
                </div>
                <div class="col">
                  <label class="form-label">Data Validade</label>
                  <input type="text" class="form-control" placeholder="AAAA" id="anoVal" name="anoVal" maxlength="4"required>
                </div>
              </div>
              <div class="form-row">
                  <div class="col">
                  <label class="form-label">CVC (código de segurança)</label>
                  <input type="text" class="form-control" id="CVV" name="CVV" placeholder="XXX" maxlength="3" required>
                </div>
              </div>
              <input type="submit" class="form-control" name="Comprar" value="Comprar" id="BotaoComprar">
            </form>
            </div>
              
              <div class="tab-pane fade ui-bordered p-4" id="payment-methods-paypal">
                <form name="Form1" id="Form1" action="payment/controllerPedidoBoleto.php" method="post">
                  <small class="btn-warning">OBS: Pagamento em boleto pode sofrer alteração no valor.</small>
                  <input type="hidden" id="TokenCard" name="TokenCard">
                  <input type="hidden" id="HashCard" name="HashCard">
                  <input type="hidden" id="Valor" name="Valor"  value="<?php echo $valor; ?>.00">
                  <input type="submit" class="btn btn-lg btn-primary btn-block" value="Gerar Boleto">
                  
                </form>
            </div>
          </div>
        </div>
      </div>
      <!-- / Payment -->

      <!-- Confirmation -->
      <div id="shop-checkout-wizard-3" class="animated fadeIn">
        <!-- Shopping cart table -->
        <h6 class="text-light small font-weight-normal">
          <span class="ion ion-md-cart"></span> &nbsp; Dados de compra
        </h6>
        <div class="table-responsive">
          <table class="table table-bordered m-0" style="min-width:550px;">
            <tbody>

              <tr>
                <td class="p-4">
                  <div class="media align-items-center">
                    <?php 
                        //PEGAR IMAGEM DO EVENTO PELO ID

                    $resIMG = mysqli_query($con,"select eveImgNome from evento JOIN evento_img where idEventos = $idGET ")or die(mysqli_error($con));
                    $mostrar = mysqli_fetch_assoc($resIMG);
                    $img = $mostrar['eveImgNome'];

                    ?>


                    <img src="uploads/<?php echo $img; ?>" class="d-block ui-w-40 ui-bordered mr-4" alt>
                    <div class="media-body">
                      <a href="#" class="d-block text-body"><?php echo $title ?></a>
                      <small>
                        <span class="text-muted">Data: <?php echo date('d-m-Y', strtotime($data)); ?> </span>
                        
                        
                      </small>
                    </div>
                  </div>
                </td>
                <!-- Set column width -->
                <td class="align-middle p-4" style="width: 66px;">x1</td>
                <!-- Set column width -->
                <td class="text-right font-weight-semibold align-middle p-4" style="width: 100px;">R$<?php echo $valor; ?>,00</td>
              </tr>

              <tr>
                <td class="p-4">
                  <div class="media align-items-center">
                    <img src="uploads/refeicao.png" class="d-block ui-w-40 ui-bordered mr-4" alt>
                    <div class="media-body">
                      <a href="#" class="d-block text-body">Refeição</a>
                      <small><span class="text-muted">Almoço</span></small>
                    </div>
                  </div>
                </td>
                <td class="align-middle p-4">x2</td>
                <td class="text-right font-weight-semibold align-middle p-4">R$20,00</td>
              </tr>

            </tbody>
          </table>
        </div>
        <!-- / Shopping cart table -->

        <h6 class="text-light small font-weight-normal mt-5">
          <span class="ion ion-md-card"></span> &nbsp; Forma de pagamento
        </h6>
        <div class="d-flex justify-content-start align-items-center rounded ui-bordered p-3">
          <img src="assets/img/payment/Visa-light.png" class="ui-payment-small mr-1" alt> XXXX-XXXX-XXXX-1234
        </div>

        

        <hr class="mt-5 mb-4">

        <div class="text-right">
          <div class="text-muted">Valor Total</div>
          <div class="text-large">
            <strong>R$80,00</strong>
          </div>
        </div>
      </div>
      <!-- / Confirmation -->

    </div>
  </div>
  <!-- / Wizard -->

  <!-- Footer -->
  <nav class="footer bp-3 bg-lighter pt-4">
    <div class="container px-3 pt-4">
      <div class="row">
        <div class="col-lg-3 pr-lg-4 pb-4">
          <a href="#" class="footer-text d-block text-large font-weight-bolder mb-3">Brand</a>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vulputate commodo justo.
          </p>
          <a class="text-twitter" href="#">
            <i class="ion ion-logo-twitter"></i>
          </a>
          &nbsp; &nbsp;
          <a class="text-facebook" href="#">
            <i class="ion ion-logo-facebook"></i>
          </a>
        </div>

        <div class="col">
          <div class="row">
            <div class="col-4 col-sm-3 col-md pb-4">
              <div class="footer-text small font-weight-bold mb-3">ABOUT US</div>
              <a href="#" class="footer-link d-block pb-2">About</a>
              <a href="#" class="footer-link d-block pb-2">Our Story</a>
              <a href="#" class="footer-link d-block pb-2">Shipping</a>
              <a href="#" class="footer-link d-block pb-2">Careers</a>
            </div>
            <div class="col-4 col-sm-3 col-md pb-4">
              <div class="footer-text small font-weight-bold mb-3">CATEGORY</div>
              <a href="#" class="footer-link d-block pb-2">Women</a>
              <a href="#" class="footer-link d-block pb-2">Man</a>
              <a href="#" class="footer-link d-block pb-2">Electronics</a>
              <a href="#" class="footer-link d-block pb-2">Other</a>
            </div>
            <div class="col-4 col-sm-3 col-md pb-4">
              <div class="footer-text small font-weight-bold mb-3">SUPPORT</div>
              <a href="#" class="footer-link d-block pb-2">FAQ</a>
              <a href="#" class="footer-link d-block pb-2">Support</a>
              <a href="#" class="footer-link d-block pb-2">Consultant</a>
            </div>
            <div class="col-4 col-sm-3 col-md pb-4">
              <div class="footer-text small font-weight-bold mb-3">PARTNERS</div>
              <a href="#" class="footer-link d-block pb-2">Wholesale</a>
              <a href="#" class="footer-link d-block pb-2">Office solutions</a>
              <a href="#" class="footer-link d-block pb-2">Press Resource</a>
            </div>
            <div class="col-4 col-sm-3 col-md pb-4">
              <div class="footer-text small font-weight-bold mb-3">ACCOUNT</div>
              <a href="#" class="footer-link d-block pb-2">Log In</a>
              <a href="#" class="footer-link d-block pb-2">Create Account</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <hr class="m-0">
    <div class="container py-4 px-3">
      <div>© 2018. All rights reserved</div>
    </div>
  </nav>
  <!-- / Footer -->

  <!-- Core scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="assets/vendor/libs/popper/popper.js"></script>
  <script src="assets/vendor/js/bootstrap.js"></script>

  <!-- Libs -->
  <script src="assets/vendor/js/mega-dropdown.js"></script></body>
  <script src="assets/vendor/libs/swiper/swiper.js"></script>
  <script src="assets/vendor/libs/smartwizard/smartwizard.js"></script>


  <!-- Page -->
  <script src="assets/js/shop.js"></script>
  <script src="payment/jspayment.js"></script>
</html>
