<!DOCTYPE html>

<html lang="en" class="default-style">

<head>
  <title>Password reset - Pages - Appwork</title>

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
  <!-- Page -->
  <link rel="stylesheet" href="assets/vendor/css/pages/authentication.css">
</head>

<body>
  <div class="page-loader">
    <div class="bg-primary"></div>
  </div>

  <!-- Content -->

  <div class="authentication-wrapper authentication-2 px-4">
    <div class="authentication-inner py-5">
      <?php 
            error_reporting(0);
            $errou = $_GET['error'];
            $hora = $_GET['hora'];
            switch ($errou) {
              case 1:
                echo "<div id='erro' class='alert alert-dark-danger alert-dismissible fade show'>
                        <button type='button' class='close' onclick='hide()'>&times;</button>
                        Senha já foi solicitada!
                      </div>";
                break;
              case 2:
                echo "<div id='erro' class='alert alert-dark-danger alert-dismissible fade show'>
                      <button type='button' class='close' onclick='hide()'>&times;</button>
                      Não existe usuario para este E-mail
                    </div>";
                break;
              case 3:
                echo "<div id='erro'class='alert alert-dark-danger alert-dismissible fade show'>
                      <button type='button' class='close' onclick='hide()'>&times;</button>
                      Sua tentativa expirou as:<b> $hora</b> 
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

      <!-- Form -->
      <form class="card" method="POST" action="recuperaSenha.php?opc=1">
        <div class="p-4 p-sm-5">

          <!-- Logo -->
          <div class="d-flex justify-content-center align-items-center pb-2 mb-4">
            <div class="ui-w-60">
              <div class="w-100 position-relative" style="padding-bottom: 54%">
                <svg class="w-100 h-100 position-absolute" viewBox="0 0 148 80" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><linearGradient id="a" x1="46.49" x2="62.46" y1="53.39" y2="48.2" gradientUnits="userSpaceOnUse"><stop stop-opacity=".25" offset="0"></stop><stop stop-opacity=".1" offset=".3"></stop><stop stop-opacity="0" offset=".9"></stop></linearGradient><linearGradient id="e" x1="76.9" x2="92.64" y1="26.38" y2="31.49" xlink:href="#a"></linearGradient><linearGradient id="d" x1="107.12" x2="122.74" y1="53.41" y2="48.33" xlink:href="#a"></linearGradient></defs><path class="fill-primary" transform="translate(-.1)" d="M121.36,0,104.42,45.08,88.71,3.28A5.09,5.09,0,0,0,83.93,0H64.27A5.09,5.09,0,0,0,59.5,3.28L43.79,45.08,26.85,0H.1L29.43,76.74A5.09,5.09,0,0,0,34.19,80H53.39a5.09,5.09,0,0,0,4.77-3.26L74.1,35l16,41.74A5.09,5.09,0,0,0,94.82,80h18.95a5.09,5.09,0,0,0,4.76-3.24L148.1,0Z"></path><path transform="translate(-.1)" d="M52.19,22.73l-8.4,22.35L56.51,78.94a5,5,0,0,0,1.64-2.19l7.34-19.2Z" fill="url(#a)"></path><path transform="translate(-.1)" d="M95.73,22l-7-18.69a5,5,0,0,0-1.64-2.21L74.1,35l8.33,21.79Z" fill="url(#e)"></path><path transform="translate(-.1)" d="M112.73,23l-8.31,22.12,12.66,33.7a5,5,0,0,0,1.45-2l7.3-18.93Z" fill="url(#d)"></path></svg>
              </div>
            </div>
          </div>
          <!-- / Logo -->

          <h5 class="text-center text-muted font-weight-normal mb-4">Resetar a senha</h5>
          <hr class="mt-0 mb-4">
          <p>
            Digite um email para proceder com a recuperação de senha
          </p>
            <div class="form-group">
              <input type="text" class="form-control" name="emailUser" placeholder="Endereço de email" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Enviar para email</button>
      </form>
      <!-- / Form -->

    </div>
  </div>

  <!-- / Content -->

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