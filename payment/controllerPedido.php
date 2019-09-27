<?php 

include("Config.php");

$TokenCard=$_POST['TokenCard'];
$HashCard=$_POST['HashCard'];
$Valor=$_POST['Valor'];

//$Valor=filter_input(INPUT_POST,'Valor',FILTER_SANITIZE_SPECIAL_CHARS);
$QtdParcelas=filter_input(INPUT_POST,'QtdParcelas',FILTER_SANITIZE_SPECIAL_CHARS);
$ValorParcelas=filter_input(INPUT_POST,'ValorParcelas',FILTER_SANITIZE_SPECIAL_CHARS);
//$CPFCartao=filter_input(INPUT_POST,'CPFCartao',FILTER_SANITIZE_SPECIAL_CHARS);
$NomeComprador=filter_input(INPUT_POST,'NomeComprador',FILTER_SANITIZE_SPECIAL_CHARS);
$CPFComprador=filter_input(INPUT_POST,'CPFComprador',FILTER_SANITIZE_SPECIAL_CHARS);
//$DDDComprador=filter_input(INPUT_POST,'DDDComprador',FILTER_SANITIZE_SPECIAL_CHARS);
//$TelefoneComprador=filter_input(INPUT_POST,'TelefoneComprador',FILTER_SANITIZE_SPECIAL_CHARS);
$NomeCartao=filter_input(INPUT_POST,'NomeCartao',FILTER_SANITIZE_SPECIAL_CHARS);
$nomeSend = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_SPECIAL_CHARS);
$meial = filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS);




$Data["email"]=EMAIL_PAGSEGURO;
$Data["token"]=TOKEN_SANDBOX;
$Data["paymentMode"]="default";
$Data["paymentMethod"]="creditCard";
$Data["receiverEmail"]=EMAIL_PAGSEGURO;
$Data["currency"]="BRL";
$Data["itemId1"] = 1;
$Data["itemDescription1"] = 'Website';
$Data["itemAmount1"] = $Valor;
$Data["itemQuantity1"] = 1;
$Data["notificationURL="]="https://www.localhost/offroad/offroad/notificacao.php";
$Data["reference"]="83783783737";
$Data["senderName"]='José Comprador';
$Data["senderCPF"]='22111944785';
$Data["senderAreaCode"]='37';
$Data["senderPhone"]='99999999';
$Data["senderEmail"]="fulano@sandbox.pagseguro.com.br";
$Data["senderHash"]=$HashCard;
$Data["shippingType"]="1";
$Data["shippingAddressStreet"]='Av. Brig. Faria Lima';
$Data["shippingAddressNumber"]='1384';
$Data["shippingAddressComplement"]='5 Andar';
$Data["shippingAddressDistrict"]='Jardim Paulistano';
$Data["shippingAddressPostalCode"]='01452002';
$Data["shippingAddressCity"]='Sao Paulo';
$Data["shippingAddressState"]='SP';
$Data["shippingAddressCountry"]="BRA";
$Data["shippingType"]="1";
$Data["shippingCost"]="0.00";
$Data["creditCardToken"]=$TokenCard;
$Data["installmentQuantity"]=$QtdParcelas;
$Data["installmentValue"]=$ValorParcelas;
$Data["noInterestInstallmentQuantity"]=2;
$Data["creditCardHolderName"]= $NomeCartao;
$Data["creditCardHolderCPF"]='22111944785';
$Data["creditCardHolderBirthDate"]='27/10/1987';
$Data["creditCardHolderAreaCode"]='37';
$Data["creditCardHolderPhone"]='99999999';
$Data["billingAddressStreet"]='Av. Brig. Faria Lima';
$Data["billingAddressNumber"]='1384';
$Data["billingAddressComplement"]='5 Andar';
$Data["billingAddressDistrict"]='Jardim Paulistano';
$Data["billingAddressPostalCode"]='01452002';
$Data["billingAddressCity"]='Sao Paulo';
$Data["billingAddressState"]='SP';
$Data["billingAddressCountry"]="BRA";

$BuildQuery=http_build_query($Data);
$Url="https://ws.sandbox.pagseguro.uol.com.br/v2/transactions";

$Curl=curl_init($Url);
curl_setopt($Curl,CURLOPT_HTTPHEADER,Array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
curl_setopt($Curl,CURLOPT_POST,true);
curl_setopt($Curl,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($Curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($Curl,CURLOPT_POSTFIELDS,$BuildQuery);
$Retorno=curl_exec($Curl);
curl_close($Curl);

$Xml=simplexml_load_string($Retorno);
//$json = json_encode($Xml);
echo $Xml;
//$status = $Xml->status;

// if ($status == 1 ) {
// 	$res = mysqli_query($con,"INSERT INTO pagamento VALUES('')");
// 	header("Location: ../pages/minhascompras.php?pg=0");
// }else{
// 	header("Location: ../pages/minhascompras.php?pg=1");
// }
//echo $json;

//var_dump($Xml);

 ?>