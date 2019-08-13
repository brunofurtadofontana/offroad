var Root="http://"+document.location.hostname+"/";

var Amount = 200.00;
// // function getValor(){
// // 	var Amount = document.getElementById('Valor').value;
// // }

// $('#Valor').on('keyup',function(){
// 	var Amount=$(this).val();
// });

function iniciarSessao(){

	$.ajax({
		url: Root+"offroad/offroad/payment/controllerId.php",
		type:'POST',
		dataType: 'json',
		success:function(data){
			PagSeguroDirectPayment.setSessionId(data.id);
		},
		complete: function(data){
			listaMeiosPagamentos();
		}
	});

}

function listaMeiosPagamentos(){ //lista os meios de pagamentos liberados

	PagSeguroDirectPayment.getPaymentMethods({
        amount: Amount,
        success: function(data) {
            $.each(data.paymentMethods.CREDIT_CARD.options, function(i, obj){
                $('.CartaoCredito').append("<div><img src=https://stc.pagseguro.uol.com.br/"+obj.images.SMALL.path+">"+obj.name+"</div>");
            });
            $.each(data.paymentMethods.BOLETO.options, function(i, obj){
               //$('.CartaoCredito').append("<div><img src=https://stc.pagseguro.uol.com.br/"+obj.images.SMALL.path+">"+obj.name+"</div>");
               $('.Boleto').append("<div><img src=https://stc.pagseguro.uol.com.br/"+obj.images.SMALL.path+">"+obj.name+"</div>");
            });
            

            
        },
        complete: function(data) {
        	getTokenCard();
        }
    });
}


$('#NumeroCartao').on('keyup',function(){
    var NumeroCartao=$(this).val();
    var QtdCaracteres=NumeroCartao.length;

    if(QtdCaracteres == 6){
        PagSeguroDirectPayment.getBrand({
            cardBin: NumeroCartao,
            success: function(response) {
                var BandeiraImg=response.brand.name;
                $('.BandeiraCartao').html("<img src=https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/42x20/"+BandeiraImg+".png>")
            	getParcelas(BandeiraImg);
            	//$('#Valor').val(Amount);
            },
            error: function (response) {
                alert('Cartão não reconhecido');
                $('.BandeiraCartao').empty();

            }
        });
    }
});

//Obter o token do cartão de crédito
function getTokenCard()
{
    PagSeguroDirectPayment.createCardToken({
        cardNumber: '4111111111111111',
        brand: 'visa',
        cvv: '123',
        expirationMonth: '12',
        expirationYear: '2030',
        success: function(response)
        {
           $('#TokenCard').val(response.card.token);
        }
    });
}

//Exibe a quantidade e valores das parcelas
function getParcelas(Bandeira){
    PagSeguroDirectPayment.getInstallments({
        amount: Amount,
        maxInstallmentNoInterest: 2,
        brand: Bandeira,
        success: function(response)
        {
            $.each(response.installments,function(i,obj){
                $.each(obj,function(i2,obj2){
                    var NumberValue=obj2.installmentAmount;
                    var Number= "R$ "+ NumberValue.toFixed(2).replace(".",",");
                    var NumberParcelas= NumberValue.toFixed(2);
                    $('#QtdParcelas').show().append("<option value='"+obj2.quantity+"' label='"+NumberParcelas+"'>"+obj2.quantity+" parcelas de "+Number+"</option>");
                });
            });
        }
    });
}

//Pegar o valor da parcela
$("#QtdParcelas").on('change',function(){
    var ValueSelected=document.getElementById('QtdParcelas');
    $("#ValorParcelas").val(ValueSelected.options[ValueSelected.selectedIndex].label);
});

$('#BotaoComprar').on('click',function(event){
		event.preventDefault();
		PagSeguroDirectPayment.onSenderHashReady(function(response){
		   $('#HashCard').val(response.senderHash);
		    if(response.status=='success'){
        		$("#Form1").trigger('submit');
			}
		});
});
iniciarSessao();