 <?php 
      require("conn.php");
        $log = $_POST['login'];
        $pass = $_POST['senha'];
        $compra = $_GET['cp'];
        $idEv = $_GET['idEv'];
        $res = mysqli_query($con,"SELECT usuEmail, usuPrivilegio FROM usuario WHERE usuEmail='$log'")or die(mysqli_error());
        $show = mysqli_fetch_assoc($res);
        $returnLogin = $show['usuEmail'];
        $privi = $show['usuPrivilegio'];

        if($returnLogin == $_POST['login']){
          $res = mysqli_query($con,"SELECT usuSenha FROM usuario WHERE usuSenha ='$pass'")or die(mysqli_error());
          $show = mysqli_fetch_assoc($res);
          $returnpass = $show['usuSenha'];
              if ($returnpass == $_POST['senha']) {
                  session_start();
                  $_SESSION["LOGIN_USUARIO"]=$log;
                  $_SESSION["SENHA_USUARIO"]=$pass;
                  //echo $privi;
                  if($privi == 'admin') {
                    header('Location:../homeAdmin.php');
                  }else if($compra == 1 && $idEv !=0 ){//login para compra de produto
                    header('Location:../payment/checkout.php?idEvento=$idCp');
                  }else {
                    header('Location:../homeUser.php');
                  }
                  
              }else{
                header('Location:../logme.php?error=1');
              } 
        }
        else{
          header('Location:../logme.php?error=2');
        }

      

?>