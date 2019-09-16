<?php
	require("config/conn.php");
	$opc = $_GET['opc'];


	switch ($opc) {		
		case 1:
			$email = htmlspecialchars(trim(strtoupper($_POST['emailUser'])));
			$qr_email = mysqli_query($con, "SELECT usuEmail, usuToken FROM usuario WHERE usuEmail='$email'")or die(mysqli_error());
			$exibe = mysqli_fetch_array($qr_email);
			$buscaEmail =  $exibe['usuEmail'];
			$buscaToken =  $exibe['usuToken'];

			

			if ($buscaEmail == $_POST['emailUser']){
				//AQUI é para enviar o email de recuperação para o email do usuario
				
				if($buscaToken == NULL){//if para verificar se já existe alguma solicitação de mudança
				  
				  //echo $token;
				  setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
				  date_default_timezone_set('America/Sao_Paulo');
				 
				  $dataAtual = date("Y-m-d H:i:s");
				  $dataExpira = date('Y-m-d H:i:s', strtotime('+1 hour'));



				  // echo $dataAtual;
				  // echo "<br>";
				  // echo $dataExpira;
				  
				  
				  $qr_token = mysqli_query($con, "SELECT usuToken, usuDataSenha, usuDataExp FROM usuario WHERE usuEmail='$email'")or die(mysqli_error());
					$showToken = mysqli_fetch_array($qr_token);
					$buscaDataPedido =  $showToken['usuDataSenha'];
					$buscaDataExpira =  $showToken['usuDataExp'];



					  // echo $dataAtual;
					  // echo "<br>";
					  // echo $buscaDataExpira;

				    if(($dataAtual < $buscaDataExpira) OR ($buscaDataExpira == NULL)){//if para ver se a data da solicitação não esta expirada
				     	
				     	$token = bin2hex(random_bytes(20));
				     	$qr = mysqli_query($con,"UPDATE usuario SET usuToken = '$token',
				  											 usuDataSenha = '$dataAtual',
				  											 usuDataExp = '$dataExpira'
				  											  WHERE usuEmail='$email'")or die(mysqli_error($con));
				      	$qr_token = mysqli_query($con, "SELECT usuToken FROM usuario WHERE usuEmail='$email'")or die(mysqli_error());
						$showToken = mysqli_fetch_array($qr_token);
						$buscaToken =  $showToken['usuToken'];
					  $link = "http://localhost/offroad/novaSenha.php?recupera=".$buscaToken;

					  echo "<a href='$link'>Clique aqui</a>";
					  // $mail = new PHPMailer();

					  // $mail->IsSMTP();
					  // $mail->isHTML(true);
					  // $mail->CharSet = 'utf-8';
					  // $mail->Host = 'mx1.weblink.com.br';
					  // $mail->Port = 587;
					  // $mail->SMTPSecure = 'tls';
					  // $mail->SMTPAuth = true;
					  // $mail->Username = 'no-reply@offroad.com.br';
					  // $mail->Password = '*********';
					  // $mail->setFrom("cadastro@dalvz.com.br", "daLvz");
					  // $mail->FromName = 'daLvz';
					  // $mail->Subject = "Recuperar senha";

					  // $mensagem = "Clique <a href=".$link.">aqui</a> para recuperar sua senha." 

					  // $mail->Body = $mensagem;
					  // $mail->AltBody = "Conteudo do email em texto";

					  // $mail->addAddress($recupera);

						 //  if($mail->Send()) {

						 //    header("Location: confirmacao.php");
						 //  }else {

						 //    echo "Erro ao enviar email". $mail->ErrorInfo;
						 //  }
				     }else{
				     	$qr = mysqli_query($con,"UPDATE usuario SET usuToken = null,
				     												usuDataExp = null,
				     												usuDataSenha = null
				  											  WHERE usuEmail='$email'")or die(mysqli_error($con));
				     	
				     	$hora = date('H:i', strtotime($buscaDataExpira));
				     	//echo $hora;
				     	header("Location:forgetpass.php?error=3&hora=$hora");
				    }
				}else{//ja existe solicitação de mudança de senha
					header("Location:forgetpass.php?error=1");
				}		
			}else{
				//informar o usuario de que o email que ele enviou para recuperação não existe
				header("Location:forgetpass.php?error=2");
				}
		break;	
		default:
			# code...
		break;
	}
?>