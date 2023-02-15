///////////////////////////
//////// FUNTIONS /////////
///////////////////////////
function recuperaGET(param) {
    var result = null,
    tmp = [];
    location.search
    .substr(1)
    .split("&")
    .forEach(function (item) {
      tmp = item.split("=");
      if (tmp[0] === param) result = decodeURIComponent(tmp[1]);
  });
    return result;
}





///////////////////////////
///// READY DOCUMENT //////
///////////////////////////
$(document).ready(function() {
    // Carrega arquivos do banco de dados e popula a tabela
    $.ajax({
        url: "PRArquivos.php",
        dataType: 'JSON',
        data: {
            control: '0'
        },
        type: "POST",
        success: function(data) {

            var conteudo = '';

            $.each(data, function(key, val) {
                var i = 0;
                i++;
                conteudo += `
                <tr>
                <td><strong>${i}</strong></td>
                <td><strong>${val.nome}</strong> <input type="hidden" value="${val.id_arquivo}"> </td>
                <td>${val.descricao}</td>
                <td>${val.criado}</td>
                <td><a href="${val.caminho}" class="btn btn-success" Download><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 15v4c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2v-4M17 9l-5 5-5-5M12 12.8V2.5"/></svg></a></td>
                </tr>`
            });

            $('#tableArquivos tbody').html(conteudo);
        }
    });

    // Click botao de adicionar novo arquivo
    $(document).on('click', '#btnAddArquivo', function() {
        $.ajax({
            url: "inserir_arquivo.php",
            dataType: 'HTML',
            type: "POST",
            success: function(data) {
                if (data == "0") {
                    $('.modal-title').html('Acesso negado');
                    $('.modal-body').html('Contate um dos administradores.');
                    $('modal').show();
                } else {
                    $('#conteudo_inicio').html(data);
                }
            }
        });
    });

    // Click botao voltar
    $(document).on('click', '#btnVoltar', function() {
        $.ajax({
            url: "arquivos.php",
            dataType: 'HTML',
            type: "POST",
            success: function(data) {
                $('#conteudo_inicio').html(data);
            }
        });
    });

    var codGET = recuperaGET('cod');

    if (codGET != '') {
        switch (codGET) {
            case "0":
            alert("Este arquivo já se encontra em nosso sistema.");
            window.location.replace('index.php');
            break;

            case "1":
            alert("Upload realizado com sucesso!");
            window.location.replace('index.php');
            break;

            case "2":
            alert("Erro ao tentar realizar o upload.\nEntre em contato com um dos administradores.");
            window.location.replace('index.php');
            break;
        }
    }
});

$(function() {

	'use strict';

	// Form

	var contactForm = function() {

		if ($('#contactForm').length > 0 ) {
			$( "#contactForm" ).validate( {
				rules: {
					name: "required",
					email: {
						required: true,
						email: true
					},
					message: {
						required: true,
						minlength: 5
					}
				},
				messages: {
					name: "Please enter your name",
					email: "Please enter a valid email address",
					message: "Please enter a message"
				},
				/* submit via ajax */
				submitHandler: function(form) {
					var $submit = $('.submitting'),
						waitText = 'Submitting...';

					$.ajax({
				      type: "POST",
				      url: "php/send-email.php",
				      data: $(form).serialize(),

				      beforeSend: function() {
				      	$submit.css('display', 'block').text(waitText);
				      },
				      success: function(msg) {
		               if (msg == 'OK') {
		               	$('#form-message-warning').hide();
				            setTimeout(function(){
		               		$('#contactForm').fadeOut();
		               	}, 1000);
				            setTimeout(function(){
				               $('#form-message-success').fadeIn();
		               	}, 1400);

			            } else {
			               $('#form-message-warning').html(msg);
				            $('#form-message-warning').fadeIn();
				            $submit.css('display', 'none');
			            }
				      },
				      error: function() {
				      	$('#form-message-warning').html("Something went wrong. Please try again.");
				         $('#form-message-warning').fadeIn();
				         $submit.css('display', 'none');
				      }
			      });
		  		}

			} );
		}
	};
	contactForm();

});

