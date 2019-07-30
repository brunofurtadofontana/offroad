var Root="http://"+document.location.hostname+"/";

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
        amount: 500.00,
        success: function(data) {
            $.each(data.paymentMethods.CREDIT_CARD.options, function(i, obj){
                $('.CartaoCredito').append("<div><img src=https://stc.pagseguro.uol.com.br/"+obj.images.SMALL.path+">"+obj.name+"</div>");
            });
            $.each(data.paymentMethods.BOLETO.options, function(i, obj){
               // $('.CartaoCredito').append("<div><img src=https://stc.pagseguro.uol.com.br/"+obj.images.SMALL.path+">"+obj.name+"</div>");
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
iniciarSessao();