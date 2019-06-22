 <?php 
      require("conn.php");
        $log = $_POST['login'];
        $pass = $_POST['senha'];
        $res = mysqli_query($con,"SELECT users_email FROM users WHERE users_email='$log'")or die(mysql_error());
        $show = mysqli_fetch_assoc($res);
        $returnLogin = $show['users_email'];

        if($returnLogin == $_POST['login']){
          $res = mysqli_query($con,"SELECT users_pass FROM users WHERE users_pass='$pass'")or die(mysql_error());
          $show = mysqli_fetch_assoc($res);
          $returnpass = $show['users_pass'];
          if ($returnpass == $_POST['senha']) {
              session_start();
              $_SESSION["LOGIN_USUARIO"]=$log;
              $_SESSION["SENHA_USUARIO"]=$pass;
              header('Location:../home.php');

            }
          else{
            header('Location:../index.php?error=1');
          } 
        }
        else{
          header('Location:../index.php?error=2');
        }

      

?>