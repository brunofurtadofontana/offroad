<?php
/* logout.php */
session_start();
unset($_SESSION["LOGIN_USUARIO"]);
session_destroy();
header("Location:../index.php?error=4");
?>