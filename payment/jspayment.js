var Root="http://"+document.location.hostname+"/";

function iniciarSessao(){

	$.ajax({
		url: Root+"controllerId.php",
		type:'POST',
		dataType: 'html',
		success:function(data){
			PagSeguroDirectPayment.setSessionId(data.id);
		}
	});
}

iniciarSessao();