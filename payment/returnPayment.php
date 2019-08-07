<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
	
	<style>
		*{margin: 0; box-sizing: border-box;}

.CartaoCredito, .Debito , .Boleto{float:left; width: 30%; margin: 30px 1.5%; border-radius: 10px; border: 1px solid #999; font-size: 18px; font-weight: bold;}
.Titulo{float:left; width: 100%; border-radius: 10px 10px 0 0; font-weight: bold; color: #fff; background: #000; text-align: center;}
	</style>
	
</head>
<body>
<form  name="Form1" id="Form1" method="post" action="controllerPedido.php">
    <input type="text" id="NumeroCartao" name="NumeroCartao"/>
    <input type="text" id="TokenCard" name="TokenCard">
    <input type="text" id="HashCard" name="HashCard">
    <select name="QtdParcelas" id="QtdParcelas">
        <option value="">Selecione</option>
    </select>
    <input type="text" id="ValorParcelas" name="ValorParcelas">
    <input type="submit" name="Comprar" value="Comprar" id="BotaoComprar">
</form>
<div class="BandeiraCartao"></div>

<div class="CartaoCredito"><div class="Titulo">Cartão de Crédito</div></div>
<div class="Boleto"><div class="Titulo">Boleto</div></div>
</body>
</html>

<script src="jspayment.js"></script>