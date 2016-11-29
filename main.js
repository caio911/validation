$(document).ready(function(){



	//SALVAR FALE CONOSCO POST AJAX
	$(".btn-default").click(function(){

		var currentButton = $(this);
		currentButton.text('Aguarde...').attr('disabled','disabled');

		var currentForm = $("#cadastro");
		var reponseDiv = $("#reponse-msg");

		var menssageErro = '';


		$.ajax({
			type: "POST",
			url: currentForm.data('actioninsert'),
			data: currentForm.serialize(),
			success: function(data, status){


				// Verifica se houve erro no cadastro
				if(data.result == 'error'){
					responseErrors(data.msg, 'danger', reponseDiv);
					currentButton.text('Enviar').removeAttr('disabled');

		    	// Se não houve error retorna sucess
		    	}else if(data.result == 'success'){

		    		$(currentForm).each(function(){
					  this.reset();
					});
					$("#cadastro").fadeOut(500);
					$('.reponse-msg').fadeIn(500);
					setTimeout(function(){
					  $('.reponse-msg').show();
					  reponseDiv.html(responseDiv('success','<p>Sua mensagem foi enviada com sucesso e será respondida em até três dias úteis.</p>'));
					}, 500);
					currentButton.text('Enviar').removeAttr('disabled');

				// Verifica se houve erro ao enviar o email
		    	}else if(data.result == 'errorEmail'){

		    		$(currentForm).each(function(){
					  this.reset();
					});
					reponseDiv.html(responseDiv('danger','Não foi possível enviar!<br>Tente novamente mais tarde!'));
					currentButton.text('Enviar').removeAttr('disabled');
					
		    	}else {
		    		reponseDiv.html(responseDiv('danger', 'Não foi possível enviar!'));
					currentButton.text('Enviar').removeAttr('disabled');
		    	}

			},
			dataType: 'json'
		});

	});


	//FUNÇÔES ////////////////////////////////////////////////////////////////////


	//box de erros
	var responseDiv = function(type, data){
		return '<div class="alert alert-'+type+'" role="alert">'+data+'</div>';
	}

	//mostra os erros retornados da api
	var responseErrors = function(json, error_type, divResponse){
		errosResponse = '';
		for (error in json) {
			errosResponse += json[error]+'<br>';
		};
		divResponse.html(responseDiv(error_type, errosResponse));
	}



});


