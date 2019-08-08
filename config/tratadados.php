<?php 
	require("conn.php");
	$opc = $_GET['opc'];
	$id = $_GET['id'];
	$idEven = $_GET['idEvento'];
	

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
		case 2://Editar Evento
			$evenNome = htmlspecialchars(trim(strtoupper($_POST['nomeEven'])));
			$evenDesc = htmlspecialchars(trim(strtoupper($_POST['descEven'])));
			$evenTipoTrilha = htmlspecialchars(trim(strtoupper($_POST['tipoTrilha'])));
			$evenData = htmlspecialchars(trim(strtoupper($_POST['dataEvento'])));
			$evenHoraInicio = htmlspecialchars(trim(strtoupper($_POST['horaInicio'])));
			$evenHoraFim = htmlspecialchars(trim(strtoupper($_POST['horaFim'])));
			$evenVlrTrilha = htmlspecialchars(trim(strtoupper($_POST['vlrTrilha'])));
			$evenRua = htmlspecialchars(trim(strtoupper($_POST['rua'])));
			$evenBairro = htmlspecialchars(trim(strtoupper($_POST['bairro'])));
			$evenCidade = htmlspecialchars(trim(strtoupper($_POST['cidade'])));
			$evenEstado = htmlspecialchars(trim(strtoupper($_POST['estado'])));


			//echo $processador."<br>".$memoriaram."<br>".$storage."<br>".$placamae."<br>".$fonte."<br>".$leitor."<br>".$finalidade."<br>".$so."<br>".$situacao."<br>".$obs;
	
			$qr = mysqli_query($con,"UPDATE evento SET  evenNome = '$evenNome',
															evenDescr = '$evenDesc',
															evenTipoTrilha = '$evenTipoTrilha',
															evenData ='$evenData',
															evenHoraInicial ='$evenHoraInicio',
															evenHoraFinal = '$evenHoraFim' 
																WHERE idEventos = $idEven ")or die(mysqli_error($con));	

				if($qr){
					$qrcomp = mysqli_query($con,"UPDATE endereco SET eveRua = '$evenRua' ,
																	 eveBairro = '$evenBairro',
																	 eveCidade = '$evenCidade',
																	 eveEstado = '$evenEstado'
																 WHERE Evento_idEventos = $idEven")or die(mysqli_error($con));				
				}
				$valorBD = mysqli_query($con,"SELECT evenVlrInscri from evento WHERE idEventos = '$idEven' ");
				$vBD = mysqli_fetch_assoc($valorBD);
				$vlrBD = $vBD['evenVlrInscri'];
				if ($vlrBD != $evenVlrTrilha ) {

				header("Location:../pages/eventos.php?error=6");
				}else{
					if(!mysqli_error()){
						header("Location:../pages/eventos.php?error=4");
					}else{
						header("Location:../pages/eventos.php?error=5");
					}
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
		case 8://Cadastrar evento
			# code...
			$evenNome = htmlspecialchars(trim(strtoupper($_POST['nomeEven'])));
			$evenDesc = htmlspecialchars(trim(strtoupper($_POST['descEven'])));
			$evenTipoTrilha = htmlspecialchars(trim(strtoupper($_POST['tipoTrilha'])));
			$evenData = htmlspecialchars(trim(strtoupper($_POST['dataEvento'])));
			$evenHoraInicio = htmlspecialchars(trim(strtoupper($_POST['horaInicio'])));
			$evenHoraFim = htmlspecialchars(trim(strtoupper($_POST['horaFim'])));
			$evenVlrTrilha = htmlspecialchars(trim(strtoupper($_POST['vlrTrilha'])));
			$evenRua = htmlspecialchars(trim(strtoupper($_POST['rua'])));
			$evenBairro = htmlspecialchars(trim(strtoupper($_POST['bairro'])));
			$evenCidade = htmlspecialchars(trim(strtoupper($_POST['cidade'])));
			$evenEstado = htmlspecialchars(trim(strtoupper($_POST['estado'])));
			//$id = $_GET['id'];			
			  $atual = new DateTime();
  			  $atual = strtotime(date("Y-m-d"));
  			  $dataUser= strtotime($evenData);
			if ($dataUser < $atual){
				header("Location:../pages/eventos.php?error=3");				
			}else{
				$qr = mysqli_query($con,"INSERT INTO evento(evenNome,
															evenDescr,
															evenTipoTrilha,
															evenData,
															evenHoraInicial,
															evenHoraFinal,
															evenVlrInscri,
															promoter_idUsuario) 
													VALUES ('$evenNome',
															'$evenDesc',
															'$evenTipoTrilha',
															'$evenData',
															'$evenHoraInicio',
															'$evenHoraFim',
															'$evenVlrTrilha',
															'$id')")or die(mysqli_error($con));
				$even = mysqli_query($con,"SELECT MAX(idEventos)as max from evento");
			    $showEven = mysqli_fetch_assoc($even);
			    $idEven = $showEven['max'];
				$qrEnde = mysqli_query($con,"INSERT INTO endereco(eveRua,
																  eveBairro,
																  eveCidade,
																  eveEstado,
																  Evento_idEventos	
																  ) 
													VALUES ('$evenRua',
															'$evenBairro',
															'$evenCidade',
															'$evenEstado',
															'$idEven')")or die(mysqli_error($con));
				if (!$qr) {
					header("Location:../pages/eventos.php?error=2");
				}else{
	                  header("Location:../pages/eventos.php?error=1");
				}
			}
			break;
		case 9://Autoriza mudança de valor
				
				$evenJust = htmlspecialchars(trim(strtoupper($_POST['evenJustifica'])));
				$evenVlrTrilha = htmlspecialchars(trim(strtoupper($_POST['evenVlrAtualizado1'])));

			break;
		case 10://Cadastrar computador
			# code...
			break;
		default:
			# code...
			break;
	}
	
	
?>