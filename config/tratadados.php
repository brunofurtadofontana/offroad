<?php 
	require("conn.php");
	$opc = $_GET['opc'];
	$id = $_GET['id'];
	

	switch ($opc) {
		case 1://Cadastrar computador
			$processador = htmlspecialchars(trim(strtoupper($_POST['processador'])));
			$memoriaram = htmlspecialchars(trim(strtoupper($_POST['memram'])));
			$storage = htmlspecialchars(trim(strtoupper($_POST['storage'])));
			$placamae = htmlspecialchars(trim(strtoupper($_POST['placamae'])));
			$fonte = htmlspecialchars(trim(strtoupper($_POST['fonte'])));
			$leitor = htmlspecialchars(trim(strtoupper($_POST['leitor'])));
			$finalidade = htmlspecialchars(trim(strtoupper($_POST['finalidade'])));
			$value = strtoupper(implode(',',$_POST['componentes']));
			$so = htmlspecialchars(trim(strtoupper($_POST['so'])));
			$situacao = htmlspecialchars(trim(strtoupper($_POST['situacao'])));
			$obs = htmlspecialchars(trim(strtoupper($_POST['obs'])));


			//echo $processador."<br>".$memoriaram."<br>".$storage."<br>".$placamae."<br>".$fonte."<br>".$leitor."<br>".$finalidade."<br>".$so."<br>".$situacao."<br>".$obs;
			
				$qr = mysqli_query($con,"INSERT INTO computador(comp_proc,
														comp_mem,
														comp_hd,
														comp_mobo,
														comp_fonte,
														comp_leitor,
														comp_finalidade,
														users_users_id,
														comp_so,
														comp_situacao,
														comp_obs) 
												VALUES ('$processador',
														'$memoriaram',
														'$storage',
														'$placamae',
														'$fonte',
														'$leitor',
														'$finalidade',
														'$id',
														'$so',
														'$situacao',
														'$obs')")or die(mysqli_error($con));	

				//if($qr){
					//$consulta = mysqli_query($con,"SELECT MAX(comp_id) FROM computador");
					//$exibe = mysqli_fetch_array($consulta);
					//$ultimoId =  $exibe[0];
					//$qrcomp = mysqli_query($con,"INSERT INTO componentes(cp_comp_id,
					//											  cp_nome) 
					//											  VALUES ('$ultimoId','$value')")or die(mysql_error());
				
				//}
				if($qr){
					$consulta = mysqli_query($con,"SELECT MAX(comp_id) FROM computador");
					$exibe = mysqli_fetch_array($consulta);
					$ultimoId =  $exibe[0];
					$qrcomp = mysqli_query($con,"INSERT INTO componentes(computador_comp_id,
																  cp_nome) 
																  VALUES ('$ultimoId','$value')")or die(mysql_error());
					header("Location:../home.php?error=0");
				}else{
					header("Location:../home.php?error=1");
				}
			break;
		case 2://Editar computador
			$idCP = $_GET['idCP'];
			$processador = htmlspecialchars(trim(strtoupper($_POST['processador'])));
			$memoriaram = htmlspecialchars(trim(strtoupper($_POST['memram'])));
			$storage = htmlspecialchars(trim(strtoupper($_POST['storage'])));
			$placamae = htmlspecialchars(trim(strtoupper($_POST['placamae'])));
			$fonte = htmlspecialchars(trim(strtoupper($_POST['fonte'])));
			$leitor = htmlspecialchars(trim(strtoupper($_POST['leitor'])));
			$finalidade = htmlspecialchars(trim(strtoupper($_POST['finalidade'])));
			$value = strtoupper(implode(',',$_POST['componentes']));
			$so = htmlspecialchars(trim(strtoupper($_POST['so'])));
			$situacao = htmlspecialchars(trim(strtoupper($_POST['situacao'])));
			$obs = htmlspecialchars(trim(strtoupper($_POST['obs'])));


			//echo $processador."<br>".$memoriaram."<br>".$storage."<br>".$placamae."<br>".$fonte."<br>".$leitor."<br>".$finalidade."<br>".$so."<br>".$situacao."<br>".$obs;
			
				$qr = mysqli_query($con,"UPDATE computador SET  comp_proc = '$processador',
																comp_mem = '$memoriaram',
																comp_hd = '$storage',
																comp_mobo ='$placamae',
																comp_fonte ='$fonte',
																comp_leitor = '$leitor',
																comp_finalidade = '$finalidade',
																comp_so = '$so',
																comp_situacao = '$situacao',
																comp_obs = '$obs' 
																WHERE comp_id = $idCP ")or die(mysqli_error($con));	

				if($qr){
					$qrcomp = mysqli_query($con,"UPDATE componentes SET cp_nome = '$value' WHERE computador_comp_id = $id ")or die(mysqli_error($con));
				
				}
				if(!mysqli_error()){
					header("Location:../excluirPC.php?error=0");
				}else{
					header("Location:../excluirPC.php?error=1");
				}
			break;
		case 3://Deletar computador
					$idCP = $_GET['idCP'];
					$res = mysqli_query($con,"Delete from computador WHERE comp_id = '$idCP' ")or die(mysqli_error($con));
					if($res){
					$resDel = mysqli_query($con,"DELETE from componentes WHERE computador_comp_id = $idCP")or die(mysqli_error($con));
						echo header("location:../excluirPC.php?error=2");
					}else echo header("location:../excluirPC.php?error=3");
				
			break;
		case 4://Cadastrar usuario
			$nome = htmlspecialchars(trim(strtoupper($_POST['nome'])));
			$email = htmlspecialchars(trim(strtoupper($_POST['email'])));
			$senha = htmlspecialchars(trim(strtoupper($_POST['pass'])));
			$qr = mysqli_query($con,"INSERT INTO users(users_nome,
														users_email,
														users_pass,
														users_priv) 
												VALUES ('$nome',
														'$email',
														'$senha',
														'user')")or die(mysqli_error($con));
			if (!$qr) {
				header("Location:../home.php?error=0");
			}else{
				header("Location:../home.php?error=1");
			}
			break;
		case 5://Editar usuario
			$nome = htmlspecialchars(trim(strtoupper($_POST['nome'])));
			$email = htmlspecialchars(trim(strtoupper($_POST['email'])));
			$senha = htmlspecialchars(trim(strtoupper($_POST['pass'])));
			$qr = mysqli_query($con,"UPDATE users SET users_nome = '$nome',
														users_email = '$email',
														users_pass = '$senha'")or die(mysqli_error($con));
			if ($qr) {
				header("Location:../gerenciarUsers.php?error=0");
			}else{
				header("Location:../gerenciarUsers.php?error=1");
			}
			break;
		case 6://Deletar usuario
					$res = mysqli_query($con,"Delete from users WHERE users_id = '$id' ")or die(mysqli_error($con));
					if($res){
						echo header("location:../gerenciarUsers.php?error=2");
					}else echo header("location:../gerenciaUsers.php?error=3");
			break;
		case 7://Cadastrar reserva
			$datain = htmlspecialchars(trim($_POST['datain']));
			$datafim = htmlspecialchars(trim($_POST['datafim']));
			$finalidade = htmlspecialchars(trim(strtoupper($_POST['finalidade'])));
			//$computadores = $_POST['comp'];
			foreach($_POST['comp'] as $index => $val){

				$qr = mysqli_query($con,"INSERT INTO reserva(
														res_finalidade,
														res_datain,
														res_datafim,
														computador_comp_id,
														computador_users_users_id
														) 
												VALUES ('$finalidade',
														'$datain',
														'$datafim',
														'$val',
														'$id')")or die(mysqli_error($con));	
			}
			foreach($_POST['comp'] as $index => $idcomp){
				$req = mysqli_query($con,"UPDATE computador SET comp_situacao = 'EM USO' WHERE comp_id = $idcomp ")or die(mysqli_error($con));
			}
				
				if($qr && $req){
					header("Location:../home.php?error=0");
				}else{
					header("Location:../home.php?error=1");
				}
			break;
		case 8://Cadastrar computador
			# code...
			break;
		case 9://Cadastrar computador
			# code...
			break;
		case 10://Cadastrar computador
			# code...
			break;
		default:
			# code...
			break;
	}
	
	
?>