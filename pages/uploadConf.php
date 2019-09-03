<?php
  session_start();
  include("../config/verifica.php"); //Verifica a sessão esta ativa
  include("../config/conn.php"); //Importa conexão com banco de dados
  $name = $_SESSION['LOGIN_USUARIO'];
  $idEven = $_GET['idEvento'];
  $id = $_GET['id'];

  $msg = false;

  if(isset($_FILES['arquivo'])){
    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
    $novo_nome = md5(time()) .$extensao;
    $diretorio = "upload/";

    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

    $sql_code = mysqli_query($con,"INSERT INTO evento_img (eveImgNome, eveImgData, Evento_idEventos) VALUES ('$novo_nome', NOW(), '$idEven')")or die(mysqli_error($con));
    
    if (!$sql_code) {
      echo "Falha ao Enviar arquivo";
      $msg = "Falha ao Enviar arquivo";
      # code...
    }else{
      echo "Arquivo enviado com sucesso";
      $msg = "Arquivo enviado com sucesso";

    }
  }
  if ($msg != false) {
    echo "<p> $msg </p>" ;
    # code...
  }
?>