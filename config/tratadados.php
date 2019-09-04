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
			$evenDataInicial = htmlspecialchars(trim(strtoupper($_POST['dataEvento'])));
			$evenHoraInicio = htmlspecialchars(trim(strtoupper($_POST['horaInicio'])));
			$evenHoraFim = htmlspecialchars(trim(strtoupper($_POST['horaFim'])));
			$evenVlrTrilha = htmlspecialchars(trim(strtoupper($_POST['vlrTrilha'])));
			$evenRua = htmlspecialchars(trim(strtoupper($_POST['rua'])));
			$evenBairro = htmlspecialchars(trim(strtoupper($_POST['bairro'])));
			$evenCidade = htmlspecialchars(trim(strtoupper($_POST['cidade'])));
			$evenEstado = htmlspecialchars(trim(strtoupper($_POST['estado'])));
			$adeQtd = htmlspecialchars(trim(strtoupper($_POST['almoQtd'])));
			$almoQtd = htmlspecialchars(trim(strtoupper($_POST['adeQtd'])));
			$bebiQtd = htmlspecialchars(trim(strtoupper($_POST['bebiQtd'])));
			$camP = htmlspecialchars(trim(strtoupper($_POST['camisaP'])));
			$camM = htmlspecialchars(trim(strtoupper($_POST['camisaM'])));
			$camG = htmlspecialchars(trim(strtoupper($_POST['camisaG'])));
			$camGG = htmlspecialchars(trim(strtoupper($_POST['camisaGG'])));
			$camEG = htmlspecialchars(trim(strtoupper($_POST['camisaEG'])));
			$valorAlmo = htmlspecialchars(trim(strtoupper($_POST['vlrAlmo'])));

			$vlrTrilha = $evenVlrTrilha;
			$valorAlmo2 = str_replace('.','',$valorAlmo);
    		$evenVlrTrilha= str_replace('.','',$evenVlrTrilha);
    		$valorBD = mysqli_query($con,"SELECT evenVlrInscri, evenVlrAlmoco from evento WHERE idEventos = '$idEven' ");
				$vBD = mysqli_fetch_assoc($valorBD);
				$vlrBD = $vBD['evenVlrInscri'];
				$vlrBDalmo = $vBD['evenVlrAlmo'];
			if ($vlrBD != $vlrTrilha ){

				header("Location:../pages/eventos.php?error=6");

			}
			if ($vlrBDalmo == $valorAlmo) {

				echo "mesmo valor";
				
			}else{


			//echo $processador."<br>".$memoriaram."<br>".$storage."<br>".$placamae."<br>".$fonte."<br>".$leitor."<br>".$finalidade."<br>".$so."<br>".$situacao."<br>".$obs;
	
			$qr = mysqli_query($con,"UPDATE evento SET  evenNome = '$evenNome',
															evenDescr = '$evenDesc',
															evenTipoTrilha = '$evenTipoTrilha',
															evenDataInicial ='$evenDataInicial',
															evenHoraInicial ='$evenHoraInicio',
															evenHoraFinal = '$evenHoraFim' ,
															evenVlrAlmoco = '$valorAlmo2'
														WHERE idEventos = $idEven ")or die(mysqli_error($con));
				if ($qr) {		
					$qr_camisa =  mysqli_query($con,"UPDATE camisa SET  camTamP = '$camP',
																		camTamM = '$camM',
																		camTamG = '$camG',
																		camTamGG = '$camGG',
																		camTamEG = '$camEG'
																		WHERE idCamisa = $idEven")or die(mysqli_error($con));
				}
				if($qr_camisa){
					$qr_item = 	mysqli_query($con,"UPDATE item_trilha SET  iteAdesivo = '$adeQtd',
																		   iteBebida = '$bebiQtd',
																		   iteAlmoco = '$almoQtd'
																		WHERE idItem_Trilha = $idEven")or die(mysqli_error($con));
				}
				if($qr_item){
							$qrcomp = mysqli_query($con,"UPDATE endereco SET eveRua = '$evenRua' ,
																			 eveBairro = '$evenBairro',
																			 eveCidade = '$evenCidade',
																			 eveEstado = '$evenEstado'
																		 WHERE Evento_idEventos = $idEven")or die(mysqli_error($con));				
				}
				if(!mysqli_error()){
						// header("Location:../pages/eventos.php?error=4");
					header("Location:../pages/editaUp.php?idEvento=$idEven");

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
			$evenDataInicial = htmlspecialchars(trim(strtoupper($_POST['dataEvento'])));
			$evenHoraInicio = htmlspecialchars(trim(strtoupper($_POST['horaInicio'])));
			$evenHoraFim = htmlspecialchars(trim(strtoupper($_POST['horaFim'])));
			$evenVlrTrilha = htmlspecialchars(trim(strtoupper($_POST['vlrTrilha'])));
			$evenRua = htmlspecialchars(trim(strtoupper($_POST['rua'])));
			$evenBairro = htmlspecialchars(trim(strtoupper($_POST['bairro'])));
			$evenCidade = htmlspecialchars(trim(strtoupper($_POST['cidade'])));
			$evenEstado = htmlspecialchars(trim(strtoupper($_POST['estado'])));
			$adeQtd = htmlspecialchars(trim(strtoupper($_POST['almoQtd'])));
			$almoQtd = htmlspecialchars(trim(strtoupper($_POST['adeQtd'])));
			$bebiQtd = htmlspecialchars(trim(strtoupper($_POST['bebiQtd'])));
			$camP = htmlspecialchars(trim(strtoupper($_POST['camisaP'])));
			$camM = htmlspecialchars(trim(strtoupper($_POST['camisaM'])));
			$camG = htmlspecialchars(trim(strtoupper($_POST['camisaG'])));
			$camGG = htmlspecialchars(trim(strtoupper($_POST['camisaGG'])));
			$camEG = htmlspecialchars(trim(strtoupper($_POST['camisaEG'])));
			$valorAlmo = htmlspecialchars(trim(strtoupper($_POST['vlrAlmo'])));
			$id = $_GET['id'];
			$valorAlmo = str_replace('.','',$valorAlmo);
    		$evenVlrTrilha= str_replace('.','',$evenVlrTrilha);

			
				//header("Location:../pages/cadastraEvento.php?error=3");				
			$qr = mysqli_query($con,"INSERT INTO evento(evenNome,
															evenDescr,
															evenTipoTrilha,
															evenDataInicial,
															evenHoraInicial,
															evenHoraFinal,
															evenVlrInscri,
															evenVlrAlmoco,
															promoter_idUsuario) 
													VALUES ('$evenNome',
															'$evenDesc',
															'$evenTipoTrilha',
															'$evenDataInicial',
															'$evenHoraInicio',
															'$evenHoraFim',
															'$evenVlrTrilha',
															'$valorAlmo',
															'$id')")or die(mysqli_error($con));
				$even = mysqli_query($con,"SELECT MAX(idEventos)as max from evento");
			    $showEven = mysqli_fetch_assoc($even);
			    $idEven = $showEven['max'];
				$qrEnde = mysqli_query($con,"INSERT INTO endereco (eveRua,
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
				$qrAcessorio = mysqli_query($con,"INSERT INTO item_trilha(iteAdesivo,
																  iteBebida,
																  iteAlmoco,
																  Evento_idEventos	
																  ) 
													VALUES ('$adeQtd',
															'$bebiQtd',
															'$almoQtd',
															'$idEven')")or die(mysqli_error($con));
				$qrCamisa = mysqli_query($con,"INSERT INTO camisa(camTamP,
																  camTamM,
																  camTamG,
																  camTamGG,
																  camTamEG,
																  Evento_idEventos	
																  ) 
													VALUES ('$camP',
															'$camM',
															'$camG',
															'$camGG',
															'$camEG',
															'$idEven')")or die(mysqli_error($con));
				if (!$qr) {
					header("Location:../pages/eventos.php?error=2");
				}else{
					header("Location:../pages/upload.php?idEvento=$idEven");	
	                  //header("Location:../pages/eventos.php?error=1");
				}
			break;
		case 9://Autoriza mudança de valor
				
				$evenJust = htmlspecialchars(trim(strtoupper($_POST['evenJustifica'])));
				$evenVlrTrilha = htmlspecialchars(trim(strtoupper($_POST['evenVlrAtualizado1'])));

			break;
		case 10://Cadastrar computador
		

		if(isset($_FILES['files'])){
        $errors= array();
       
    	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
    		$file_name = md5($_FILES['files']['name'][$key]);
            $file_size =$_FILES['files']['size'][$key];
            $file_tmp =$_FILES['files']['tmp_name'][$key];
            $file_type=$_FILES['files']['type'][$key];
            if($file_size > 3097152){
    			$errors[]='File size must be less than 3 MB';
            }		
            $desired_dir="../pages/upload";
            if(empty($errors)==true){
                if(is_dir($desired_dir)==false){
                    mkdir("$desired_dir", 0700);		// Create directory if it does not exist
                }
                if(is_dir("$desired_dir/".$file_name)==false){
                    move_uploaded_file($file_tmp,"../pages/upload/".$file_name);
                }else{									//rename the file if another one exist
                    $new_dir="../pages/upload/".$file_name.time();
                     rename($file_tmp,$new_dir) ;				
                }

                 
            $qrimg = mysqli_query($con,"INSERT INTO evento_img (eveImgNome,
																eveImgData,
																Evento_idEventos) 
													VALUES ('$file_name',
															 NOW(),
															'$idEven')")or die(mysqli_error($con));
               

            }else{
                    print_r($errors);
            }
            
        }
    	if(empty($error)){
           
           header("Location:../pages/eventos.php?error=1");
    	}
    }
			break;
		case 11://EDITA IMAGEM
			if(isset($_FILES['files'])){
        $errors= array();
       
    	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
    		$file_name = md5($_FILES['files']['name'][$key]);
            $file_size =$_FILES['files']['size'][$key];
            $file_tmp =$_FILES['files']['tmp_name'][$key];
            $file_type=$_FILES['files']['type'][$key];
            if($file_size > 3097152){
    			$errors[]='File size must be less than 3 MB';
            }		
            $desired_dir="../pages/upload";
            if(empty($errors)==true){
                if(is_dir($desired_dir)==false){
                    mkdir("$desired_dir", 0700);		// Create directory if it does not exist
                }
                if(is_dir("$desired_dir/".$file_name)==false){
                    move_uploaded_file($file_tmp,"../pages/upload/".$file_name);
                }else{									//rename the file if another one exist
                    $new_dir="../pages/upload/".$file_name.time();
                     rename($file_tmp,$new_dir) ;				
                }

                 
            $qr = mysqli_query($con,"UPDATE evento_img SET  eveImgNome = '$file_name',
															eveImgData = NOW()
														WHERE Evento_idEventos = $idEven")or die(mysqli_error($con));
               

            }else{
                    print_r($errors);
            }
            
        }
    	if(empty($error)){
           
           header("Location:../pages/eventos.php?error=1");
    	}
    }
			break;
		default:
			# code...
			break;
	}
	
	
?>